@extends('layouts.templet')

@section('contentCountry')
<style>
    .status {
        display: flex;
        flex-direction: column;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 20px;
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 20px;
    }

    .topInfos {
        color: black;
        display: flex;
        justify-content: space-between;
        margin: 20px;
    }
    
 
    .sunrise {
        background-color: rgba(255, 255, 255, 0.5);
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 20px;
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 20px;
        font-size: 30px; 
    }
   

    .sunset {
        background-color: rgba(255, 255, 255, 0.5);
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 20px;
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 20px;
        font-size: 30px;
       
    }

    .situation {
        background-color: rgba(255, 255, 255, 0.5);
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 20px;
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 20px;
        font-size: 30px;
        @media (max-width: 990px) { 
            font-size: 15px;
        }
    }

    .iconic{
        width: 50px;
        height: 50px;
    }
    .iconic2{
        width: 100%;
        height: 140px;
        border-radius: 10px;
    }
/* Media  */
    @media (max-width: 1200px) { 
        .sunrise {
        font-size: 20px;
        margin-bottom: 10px;
        }
        .sunset {
        font-size: 20px;
        margin-bottom: 10px;
        }
        .situation {
            font-size: 20px; 
            margin-bottom: 10px; 
        }

    }
    @media (max-width: 990px) { 
        .sunrise {
            font-size: 15px;
        }
        .sunset {
            font-size: 15px; 
        }
        .situation {
            font-size: 15px;
        }
    }

    @media (max-width: 768px) { 
        .topInfos {
            flex-direction: column;
        }   
        .iconic2{
            height: auto;
            width: 70%;
            margin: auto;
            display: flex;     
        }
      
       
    }
</style>
<div class="chartposition">
    <h1>Ville de {{ $cityName }}</h1>
</div>
<section class="status">
    <!-- Rangée 1 -->

    <div class="registerweather">
        <small>Heure de l'enregistrement : {{ $recordedTime }}</small>
    </div>

    <!-- Rangée 2 -->
    <section class="topInfos">
        <div class="sunrise">
            <img src="{{ asset('/lib/3221344.png')}}" alt="" class="iconic">
            <p>Lever du soleil: <br> {{ $sunrise }}</p>
        </div>
        <div class="sunset">
            <img src="{{ asset('/lib/5168610.png')}}" alt="" class="iconic">
            <p>Coucher du soleil:<br> {{ $sunset }}</p>

        </div>
        <div class="situation">
            <p>{{ $description }}</p>
            @if($description == 'couvert')
                <img src="{{ asset('/lib/nuage.jpeg')}}" alt="" class="iconic2">
            @elseif($description == 'ciel dégagé')
                <img src="{{ asset('/lib/clear_sky.jpg')}}" alt="" class="iconic2">
            @elseif($description == 'nuage brisé')
                <img src="{{ asset('/lib/broken_cloud.jpg')}}" alt="" class="iconic2">
            @elseif($description == 'lèger neige')
                <img src="{{ asset('/lib/light_snow.jpg')}}" alt="" class="iconic2">
            @elseif($description == 'bruine légère')
                <img src="{{ asset('/lib/bruine.png')}}" alt="" class="iconic2">
            @else    
                <!-- Ajoutez d'autres conditions si nécessaire -->
                <img src="{{ asset('/lib/rain.jpg')}}" alt="" class="iconic2">
            @endif

        </div>
    </section>
    <!-- Rangée 3 -->
    <section class="organiz">
        <div class="chartposition">
            <img src="{{ asset('/lib/vent.png')}}" alt="" class="iconic">
            <p>vitesse des vents : <br> {{ $vent }} km/h</p>
        </div>
        <div class="chartposition">
            <img src="{{ asset('/lib/pression.png')}}" alt="" class="iconic">
            <p>Pression: <br> {{ $pression }} Bar</p>
        </div>
    </section>
    <!-- Rangée 4 -->
    <section class="organiz">
        <div class="chartposition">
            <img src="{{ asset('/lib/temperature.png')}}" alt="" class="iconic">
            <p>Témpérature : <br> {{number_format($temperature, 2) }} C°</p>
        </div>
        <div class="chartposition">
            <img src="{{ asset('/lib/humidite.png')}}" alt="" class="iconic">
            <p>Pression: <br> {{ $humidite }} %</p>
        </div>
    </section>

</section>
@endsection