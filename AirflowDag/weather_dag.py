from airflow import DAG
from datetime import timedelta, datetime
from airflow.providers.http.sensors.http import HttpSensor
import json
from airflow.providers.http.operators.http import SimpleHttpOperator
from airflow.providers.http.operators.http import HttpOperator
from airflow.operators.python import PythonOperator
from sqlalchemy import create_engine
import pandas as pd

default_args = {
    'owner': 'airflow',
    'depends_on_past': False,
    'start_date': datetime(2023, 1, 8),
    'email': ['myemail@domain.com'],
    'email_on_failure': False,
    'email_on_retry': False,
    'retries': 2,
    'retry_delay': timedelta(minutes=2)
}

def kelvin_to_fahrenheit(temp_in_kelvin):
    temp_in_fahrenheit = (temp_in_kelvin - 273.15) * (9/5) + 32
    return temp_in_fahrenheit

def transform_load_data(task_instance):

    data = task_instance.xcom_pull(task_ids="extract_weather_data")
    city = data["name"]
    weather_description = data["weather"][0]['description']
    temp_fahrenheit = kelvin_to_fahrenheit(data["main"]["temp"])
    feels_like_fahrenheit = kelvin_to_fahrenheit(data["main"]["feels_like"])
    min_temp_fahrenheit = kelvin_to_fahrenheit(data["main"]["temp_min"])
    max_temp_fahrenheit = kelvin_to_fahrenheit(data["main"]["temp_max"])
    pressure = data["main"]["pressure"]
    humidity = data["main"]["humidity"]
    wind_speed = data["wind"]["speed"]
    time_of_record = str(datetime.utcfromtimestamp(data['dt'] + data['timezone']))
    sunrise_time = str(datetime.utcfromtimestamp(data['sys']['sunrise'] + data['timezone']))
    sunset_time = str(datetime.utcfromtimestamp(data['sys']['sunset'] + data['timezone']))

    transformed_data = {
        "Ville": city,
        "Description": weather_description,
        "Température (F)": temp_fahrenheit,
        "Sensation (F)": feels_like_fahrenheit,
        "Température Min (F)": min_temp_fahrenheit,
        "Température Max (F)": max_temp_fahrenheit,
        "Pression": pressure,
        "Humidité": humidity,
        "Vitesse du Vent": wind_speed,
        "Heure de l'Enregistrement": time_of_record,
        "Lever du Soleil (Heure Locale)": sunrise_time,
        "Coucher du Soleil (Heure Locale)": sunset_time
    }
    transformed_data_list = [transformed_data]
    df_data = pd.DataFrame(transformed_data_list)
    aws_credentials = {"key":"", "secret":"", "token":""}

    now = datetime.now()
    dt_string = now.strftime("%d%m%Y%H%M%S")
    dt_string = 'donnees_meteo_actuelles_paris_' + dt_string
    df_data.to_csv(f"s3://weatherdata-yml/{dt_string}.csv", index=False,storage_options=aws_credentials)

with DAG('weather_dag',
         default_args=default_args,
         schedule_interval='@daily',
         catchup=False) as dag:

    is_weather_api_ready = HttpSensor(
        task_id='is_weather_api_ready',
        http_conn_id='weathermap_api',
        endpoint='/data/2.5/weather?q=Paris&APPID=d377052237a3de709486485cb0f45f6a'
    )

    extract_weather_data = HttpOperator(
        task_id='extract_weather_data',
        http_conn_id='weathermap_api',
        endpoint='/data/2.5/weather?q=Paris&APPID=d377052237a3de709486485cb0f45f6a',
        method='GET',
        response_filter=lambda r: json.loads(r.text),
        log_response=True
    )
    

    transform_load_weather_data = PythonOperator(
        task_id='transform_load_weather_data',
        python_callable=transform_load_data
    )

    is_weather_api_ready >> extract_weather_data >> transform_load_weather_data
