<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Hôpital</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" ><h1>  Hôpital</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#doctors">Docteurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="btn btn-primary" href="/admin">Tableau de Bord</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-success" href="/admin">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>






    <div class="hero">
        <h1>Bienvenue à Notre Hôpital</h1>
        <p>Votre santé, notre priorité</p>
    </div>

    <div class="container">
        <section id="services">
            <h2 class="text-center mb-5">Nos Services</h2>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="Image de {{ $service->nom }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->nom}}</h5>
                                <p class="card-text">{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section id="doctors" class="mt-5">
            <h2 class="text-center mb-5">Nos Docteurs</h2>
            <div class="row">
                
                @foreach($doctors as $doctor)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('storage/' . $doctor->image) }}" class="card-img-top" alt="Image de {{ $doctor->nom }}">
                        <div class="card-body">
                                <label><h3>Docteur</h3> </label>
                                <h5 class="card-title">{{ $doctor->nom }}</h5>
                                <p class="card-text">{{ $doctor->service->nom }}</p>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section id="contact" class="mt-5 text-center">
            <h2 class="mb-4">Contactez-nous</h2>
            <p class="lead">Adresse : Rue Example, Les Cayes</p>
            <p class="lead">Téléphone : +509 35213122</p>
            <p class="lead">Email : contact@hopital.com</p>
        </section>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Hôpital. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
