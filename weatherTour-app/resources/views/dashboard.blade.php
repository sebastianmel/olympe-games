<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>WeatherFrance</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/offcanvas-navbar/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://www.icone-png.com/png/11/10850.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://www.icone-png.com/png/11/10850.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        .box {
            text-align: center;

        }
        .titleDash{
            background-color: rgba(255, 255, 255, 0.5);
            /* Couleur de fond avec opacité (0.5 pour 50%) */
            border-radius: 10px;
            /* Ajoutez des coins arrondis selon votre préférence */
            padding: 20px;
            /* Couleur de fond avec opacité (0.5 pour 50%) */
            border-radius: 10px;
            /* Ajoutez des coins arrondis selon votre préférence */
            padding: 20px;
        }
        .chartposition {
            background-color: rgba(255, 255, 255, 0.5);
            /* Couleur de fond avec opacité (0.5 pour 50%) */
            border-radius: 10px;
            /* Ajoutez des coins arrondis selon votre préférence */
            padding: 20px;
            /* Couleur de fond avec opacité (0.5 pour 50%) */
            border-radius: 10px;
            /* Ajoutez des coins arrondis selon votre préférence */
            padding: 20px;
            /* Dodger Blue */
            width: 45%;
            height: 350px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
      
        .organiz {
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
        @media (max-width: 768px){
            .chartposition {
                height: 350px;
                width: 100%;
                margin-bottom: 10px;
            }  
            .organiz {
                flex-direction: column;
                padding: 0px;
            }
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
    .a1{
        display: flex;
        flex-wrap: wrap;
    }
    .links{
        text-decoration: none;
        color: black;
        margin: 5px ;
        background-color: rgba(255, 255, 255, 0.5);
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
        /* Ajoutez des coins arrondis selon votre préférence */
        padding: 5px;
        /* Couleur de fond avec opacité (0.5 pour 50%) */
        border-radius: 10px;
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/offcanvas-navbar.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Weather France</a>
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Informations</a>
                    </li>

                </ul>
                 <!-- Right Side Of Navbar -->
                 <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
            <!-- <img class="me-3" src="/docs/5.3/assets/brand/bootstrap-logo-white.svg" alt="" width="48" height="38"> -->
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1">Weather France </h1>
                <small>Since 2023</small>
                <div class="a1">
        @foreach($csvData as $csvFile => $data)
            @php
                // Récupérez le nom de la ville à partir du nom du fichier CSV
                $ville = str_replace('donnees_meteo_actuelles_', '', $csvFile);
                $ville = str_replace('.csv', '', $ville);
            @endphp

            <a class="links" href="{{ url('/dashboard/'. strtolower($ville)) }}" class="">{{ ucfirst($ville) }}</a>
        @endforeach
    </div>
            </div>
        </div>
        <div class="box">
            <h1 class="titleDash">Statistique des 10 plus grandes villes de france :</h1>
            <!-- Rangée 1 -->
            <section class="organiz">
                <div class="chartposition">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="chartposition">
                    <canvas id="temperatureChart"></canvas>
                </div>
            </section>
            <!-- Rangée 2 -->
            <section class="organiz">
                <div class="chartposition">
                    <canvas id="pressureChart"></canvas>
                </div>

                <div class="chartposition">
                    <canvas id="sensationChart"></canvas>
                </div>
            </section>
            <!-- Rangée 3 -->

            <section class="organiz">
                <div class="chartposition">
                    <canvas id="humidityChart"></canvas>
                </div>
                <div class="chartposition">
                    <canvas id="windSpeedChart"></canvas>
                </div>

            </section>


            <script>
                // TEMPERATURES MOYENNE
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var csvData = @json($csvData); // Convertit le tableau PHP en JSON

                    var cities = [];
                    var temperatures = [];

                    // Récupère les noms de villes et les températures depuis les données CSV
                    for (var csvFile in csvData) {
                        if (csvData.hasOwnProperty(csvFile)) {
                            var data = csvData[csvFile];

                            data.forEach(function(row) {
                                cities.push(row[0]); // La première colonne contient le nom de la ville
                                temperatures.push(parseFloat(row[2])); // La troisième colonne contient la température
                            });
                        }
                    }

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: cities,
                            datasets: [{
                                label: 'Température Moyennes (C°)',
                                data: temperatures,
                                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            responsive: true, // Rendre le graphique responsive
            maintainAspectRatio: false // Ne pas conserver le rapport d'aspect
                        }
                    });
                });
                // TEMPERATURES MIN MAX
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx = document.getElementById('temperatureChart').getContext('2d');
                    var csvData = @json($csvData); // Convertit le tableau PHP en JSON

                    var cityLabels = [];
                    var maxTemps = [];
                    var minTemps = [];

                    // Récupère les noms de villes et les températures depuis les données CSV
                    for (var csvFile in csvData) {
                        if (csvData.hasOwnProperty(csvFile)) {
                            var data = csvData[csvFile];

                            data.forEach(function(row) {
                                cityLabels.push(row[0]); // La première colonne contient le nom de la ville
                                maxTemps.push(parseFloat(row[5])); // La sixième colonne contient la température max
                                minTemps.push(parseFloat(row[4])); // La cinquième colonne contient la température min
                            });
                        }
                    }

                    var temperatureChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: cityLabels,
                            datasets: [{
                                    label: 'Température Maximale (C°)',
                                    data: maxTemps,
                                    backgroundColor: 'rgba(255, 99, 132, 0.5)', // Couleur pour les températures maximales
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Température Minimale (C°)',
                                    data: minTemps,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Couleur pour les températures minimales
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            responsive: true, // Rendre le graphique responsive
            maintainAspectRatio: false // Ne pas conserver le rapport d'aspect
                        }
                    });
                });

                // Graphique des Pressions
                document.addEventListener('DOMContentLoaded', function() {
                    // Récupération du contexte du canvas pour le graphique des pressions
                    var pressureCtx = document.getElementById('pressureChart').getContext('2d');

                    // Récupération des données CSV
                    var csvData = @json($csvData);

                    // Initialisation des tableaux pour les labels (villes) et les pressions
                    var cityLabels = [];
                    var pressures = [];

                    // Parcours des fichiers CSV
                    for (var csvFile in csvData) {
                        if (csvData.hasOwnProperty(csvFile)) {
                            var data = csvData[csvFile];

                            // Parcours des données de chaque fichier
                            data.forEach(function(row) {
                                // Ajout du nom de la ville et de la pression aux tableaux
                                cityLabels.push(row[0]);
                                pressures.push(parseFloat(row[6])); // La septième colonne contient la pression
                            });
                        }
                    }

                    // Création du graphique des pressions
                    var pressureChart = new Chart(pressureCtx, {
                        type: 'bar',
                        data: {
                            labels: cityLabels,
                            datasets: [{
                                label: 'Pression',
                                data: pressures,
                                backgroundColor: 'rgba(255, 99, 132, 0.7)', // Couleur de fond des barres
                                borderColor: 'rgba(255, 99, 132, 1)', // Couleur de la bordure des barres
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            responsive: true, // Rendre le graphique responsive
            maintainAspectRatio: false // Ne pas conserver le rapport d'aspect
                        }
                    });
                });
                // Création du graphique des sensations

                document.addEventListener('DOMContentLoaded', function() {
                    // Récupération du contexte du canvas pour le graphique des sensations thermiques
                    var sensationCtx = document.getElementById('sensationChart').getContext('2d');

                    // Récupération des données CSV
                    var csvData = @json($csvData);

                    // Initialisation des tableaux pour les labels (villes) et les sensations thermiques
                    var cityLabels = [];
                    var sensations = [];

                    // Parcours des fichiers CSV
                    for (var csvFile in csvData) {
                        if (csvData.hasOwnProperty(csvFile)) {
                            var data = csvData[csvFile];

                            // Parcours des données de chaque fichier
                            data.forEach(function(row) {
                                // Ajout du nom de la ville et de la sensation thermique aux tableaux
                                cityLabels.push(row[0]);
                                sensations.push(parseFloat(row[3])); // La quatrième colonne contient la sensation thermique
                            });
                        }
                    }

                    // Création du graphique des sensations thermiques
                    var sensationChart = new Chart(sensationCtx, {
                        type: 'bar',
                        data: {
                            labels: cityLabels,
                            datasets: [{
                                label: 'Sensation thermique',
                                data: sensations,
                                backgroundColor: 'rgba(75, 192, 192, 0.7)', // Couleur de fond des barres
                                borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la bordure des barres
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            responsive: true, // Rendre le graphique responsive
            maintainAspectRatio: false // Ne pas conserver le rapport d'aspect
                        }
                    });
                });
                // Création du graphique de l'humidité

                document.addEventListener('DOMContentLoaded', function() {
                    // Récupération du contexte du canvas pour le graphique de l'humidité
                    var humidityCtx = document.getElementById('humidityChart').getContext('2d');

                    // Récupération des données CSV
                    var csvData = @json($csvData);

                    // Initialisation des tableaux pour les labels (villes) et l'humidité
                    var cityLabels = [];
                    var humidities = [];

                    // Parcours des fichiers CSV
                    for (var csvFile in csvData) {
                        if (csvData.hasOwnProperty(csvFile)) {
                            var data = csvData[csvFile];

                            // Ignorer la première ligne (en-tête)
                            var isFirstRow = true;

                            // Parcours des données de chaque fichier
                            data.forEach(function(row) {
                                // Ignorer la première ligne (en-tête)
                                if (isFirstRow) {
                                    isFirstRow = false;
                                    return;
                                }

                                // Vérifier si le nom de la ville n'est pas null avant de l'ajouter au tableau
                                if (row[0] !== null) {
                                    cityLabels.push(row[0]);

                                    // Vérifier si l'humidité est assignée à une ville
                                    if (row[7] !== null) {
                                        humidities.push(parseFloat(row[7])); // La huitième colonne contient l'humidité
                                    }
                                }
                            });
                        }
                    }

                    // Création du graphique de l'humidité de type polar area
                    var humidityChart = new Chart(humidityCtx, {
                        type: 'polarArea',
                        data: {
                            labels: cityLabels,
                            datasets: [{
                                label: 'Humidité',
                                data: humidities,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.7)',
                                    'rgba(54, 162, 235, 0.7)',
                                    'rgba(255, 206, 86, 0.7)',
                                    'rgba(75, 192, 192, 0.7)',
                                    'rgba(153, 102, 255, 0.7)',
                                    'rgba(255, 159, 64, 0.7)',
                                    'rgba(255, 99, 132, 0.7)', // Vous pouvez ajouter d'autres couleurs si nécessaire
                                ],
                                borderColor: 'rgba(255, 255, 255, 1)', // Couleur de la bordure des tranches
                                borderWidth: 2
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    position: 'right' // Position de la légende (à droite dans ce cas)
                                },
                                title: {
                                    display: true,
                                    text: 'Taux d\'Humidité (%)' // Titre du graphique
                                }
                            },
                            responsive: true, // Rendre le graphique responsive
                            maintainAspectRatio: false // Ne pas conserver le rapport d'aspect
                        }
                    });
                });
                // Création du graphique de vitesse des vents

                document.addEventListener('DOMContentLoaded', function () {
    // Récupération du contexte du canvas pour le graphique des vitesses du vent
    var windSpeedCtx = document.getElementById('windSpeedChart').getContext('2d');
    
    // Récupération des données CSV
    var csvData = @json($csvData);

    // Initialisation des tableaux pour les labels (villes) et les vitesses du vent
    var cityLabels = [];
    var windSpeeds = [];

    // Parcours des fichiers CSV
    for (var csvFile in csvData) {
        if (csvData.hasOwnProperty(csvFile)) {
            var data = csvData[csvFile];

            // Ignorer la première ligne (en-tête)
            var isFirstRow = true;

            // Parcours des données de chaque fichier
            data.forEach(function (row) {
                // Ignorer la première ligne (en-tête)
                if (isFirstRow) {
                    isFirstRow = false;
                    return;
                }

                // Vérifier si le nom de la ville n'est pas null avant de l'ajouter au tableau
                if (row[0] !== null) {
                    cityLabels.push(row[0]);

                    // Vérifier si la vitesse du vent est assignée à une ville
                    if (row[8] !== null) {
                        windSpeeds.push(parseFloat(row[8])); // La neuvième colonne contient la vitesse du vent
                    }
                }
            });
        }
    }

    // Création du graphique des vitesses du vent de type radar
    var windSpeedChart = new Chart(windSpeedCtx, {
        type: 'radar',
        data: {
            labels: cityLabels,
            datasets: [{
                label: 'Vitesse du Vent',
                data: windSpeeds,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                r: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false // Vous pouvez ajuster l'affichage de la légende selon vos préférences
                },
                title: {
                    display: true,
                    text: 'Graphique des Vitesses du Vent(km/h)' // Titre du graphique
                }
            },
            responsive: true, // Rendre le graphique responsive
            maintainAspectRatio: false // Ne pas conserver le rapport d'aspect
        }
    });
});

            </script>
        </div>

    </main>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/offcanvas-navbar.js')}}"></script>
</body>

</html>