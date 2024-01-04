from airflow import DAG
from datetime import timedelta, datetime
from airflow.providers.http.sensors.http import HttpSensor
import json
from airflow.providers.http.operators.http import SimpleHttpOperator
from airflow.operators.python import PythonOperator
import pandas as pd

# Fonction pour convertir la température de Kelvin en Fahrenheit
def kelvin_to_fahrenheit(temp_in_kelvin):
    temp_in_fahrenheit = (temp_in_kelvin - 273.15) * (9/5) + 32
    return temp_in_fahrenheit

# Fonction pour transformer et charger les données météorologiques
def transform_load_data(task_instance):
    # Récupérer les données extraites à partir de la tâche extract_weather_data
    data = task_instance.xcom_pull(task_ids="extract_weather_data")
    
    # Extraire différentes informations des données météorologiques
    city = data["name"]
    weather_description = data["weather"][0]['description']
    temp_fahrenheit = kelvin_to_fahrenheit(data["main"]["temp"])
    feels_like_fahrenheit = kelvin_to_fahrenheit(data["main"]["feels_like"])
    min_temp_fahrenheit = kelvin_to_fahrenheit(data["main"]["temp_min"])
    max_temp_fahrenheit = kelvin_to_fahrenheit(data["main"]["temp_max"])
    pressure = data["main"]["pressure"]
    humidity = data["main"]["humidity"]
    wind_speed = data["wind"]["speed"]
    time_of_record = datetime.utcfromtimestamp(data['dt'] + data['timezone'])
    sunrise_time = datetime.utcfromtimestamp(data['sys']['sunrise'] + data['timezone'])
    sunset_time = datetime.utcfromtimestamp(data['sys']['sunset'] + data['timezone'])

    # Créer un dictionnaire avec les données transformées
    transformed_data = {"City": city,
                        "Description": weather_description,
                        "Temperature (F)": temp_fahrenheit,
                        "Feels Like (F)": feels_like_fahrenheit,
                        "Minimun Temp (F)": min_temp_fahrenheit,
                        "Maximum Temp (F)": max_temp_fahrenheit,
                        "Pressure": pressure,
                        "Humidity": humidity,
                        "Wind Speed": wind_speed,
                        "Time of Record": time_of_record,
                        "Sunrise (Local Time)": sunrise_time,
                        "Sunset (Local Time)": sunset_time
                        }
    
    transformed_data_list = [transformed_data]
    df_data = pd.DataFrame(transformed_data_list)
    
    # Informations d'identification AWS S3
    aws_credentials = {"key": "xxxxxxxxx", "secret": "xxxxxxxxxx", "token": "xxxxxxxxxxxxxx"}

    # Créer un nom de fichier unique basé sur la date et l'heure actuelles
    now = datetime.now()
    dt_string = now.strftime("%d%m%Y%H%M%S")
    dt_string = 'current_weather_data_portland_' + dt_string
    
    # Enregistrer le DataFrame en fichier CSV sur AWS S3
    df_data.to_csv(f"s3://weatherapiairflowyoutubebucket-yml/{dt_string}.csv", index=False, storage_options=aws_credentials)

# Configuration des arguments par défaut pour le DAG
default_args = {
    'owner': 'airflow',
    'depends_on_past': False,
    'start_date': datetime(2023, 1, 4),
    'email': ['myemail@domain.com'],
    'email_on_failure': False,
    'email_on_retry': False,
    'retries': 2,
    'retry_delay': timedelta(minutes=2)
}

# Définition du DAG
with DAG('weather_dag',
        default_args=default_args,
        description='weather Api DAG',
        schedule_interval='@daily',
        catchup=False) as dag:

    # Définition d'un capteur HTTP pour vérifier si l'API météo est prête
    is_weather_api_ready = HttpSensor(
        task_id='is_weather_api_ready',
        http_conn_id='weathermap_api',
        endpoint='/data/2.5/weather?q=Paris&appid=d377052237a3de709486485cb0f45f6a'
    )

    # Définition de l'opérateur HTTP pour extraire les données météorologiques
    extract_weather_data = SimpleHttpOperator(
        task_id="extract_weather_data",
        http_conn_id='weathermap_api',
        endpoint="/data/2.5/weather?q=Paris&appid=d377052237a3de709486485cb0f45f6a",
        method="GET",
        response_filter=lambda r: json.load(r.text),
        log_response=True
    )

    # Définition de l'opérateur Python pour transformer et charger les données météorologiques
    transform_load_weather_data = PythonOperator(
        task_id="transform_load_weather_data",
        python_callable=transform_load_data
    )

    # Définir les dépendances entre les tâches
    is_weather_api_ready >> extract_weather_data >> transform_load_weather_data
