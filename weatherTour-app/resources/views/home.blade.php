@extends('layouts.app')

@section('content')
<style>
            /* Ajoutez votre CSS personnalisé ici */
            body {
                background: url(https://eskipaper.com/images/weather-wallpaper-4.jpg) no-repeat;
               height: 100vh;
                /* Ajoutez d'autres styles selon vos besoins */
            }
                    /* Largeur et couleur de la barre */
::-webkit-scrollbar {
  width: 12px;
  
}

/* La couleur du fond de la barre */
::-webkit-scrollbar-track {
  background-color: #f1f1f1;
}

/* La couleur de la barre de défilement */
::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 10px;

}

/* Effet d'ombre sur la barre de défilement */
::-webkit-scrollbar-thumb:hover {
  background-color: #555;
}
        </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
