<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
</head>
<body>
    <h1>Bienviendo a Delta Soldado</h1>
</body>
</html> -->
@extends('plantilla')
@section('contenido')
<div class="container">
    <!-- <img src="{{asset('img/fond.jpg')}}" class="img-fluid trailer-img" alt="Gears of War : E-Day">
    <h1>Bienviendo a Delta Soldado</h1> -->

    <header class="hero position-relative text-white text-center">
        <header class="hero position-relative text-white text-center">
            <div class="overlay"></div>
            <div class="container position-relative py-5">
                <div class="hero-content">
                    <h1 class="hero-title display-4 text-white">GEARS OF WAR</h1>
                    <p class="hero-subtitle lead fs-4 mb-5">¡Lucha por la supervivencia en un mundo devastado por la
                        guerra!</p>
                    <p class="hero-text mb-5">Únete a la CGO y combate a la amenaza Locust en una batalla brutal y
                        despiadada.
                        Sumérgete en una campaña épica, intensos combates multijugador y un modo horda desafiante.
                        Gears of War no es solo un juego, ¡es una guerra por la humanidad!</p>
                    <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
                        <a href="#trailer" class="btn btn-primary btn-lg px-4 py-2">
                            <i class="fas fa-play-circle me-2"></i> Ver Tráiler
                        </a>
                        <a href="#game-modes" class="btn btn-outline-light btn-lg px-4 py-2">
                            <i class="fas fa-gamepad me-2"></i> Modos de Juego
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <section id="game-modes" class="section game-modes py-5 bg-dark text-white">
            <div class="container">
                <h2 class="section-title text-center mb-5">Modos de Juego</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <article class="mode-card h-100 shadow-lg">
                            <img src="{{ asset('img/Campaña.jpg') }}" alt="Campaña" class="img-fluid" loading="lazy">
                            <div class="mode-card-body p-4">
                                <h3 class="h4">Campaña</h3>
                                <p class="mb-0">Vive la historia de Marcus Fenix y el escuadrón Delta mientras luchan
                                    contra la horda Locust.</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <article class="mode-card h-100 shadow-lg">
                            <img src="{{ asset('img/multiju.jpg') }}" alt="Multijugador" class="img-fluid"
                                loading="lazy">
                            <div class="mode-card-body p-4">
                                <h3 class="h4">Multijugador</h3>
                                <p class="mb-0">Compite en combates tácticos con escopetas Gnasher y rifles Lancer en
                                    mapas icónicos.</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <article class="mode-card h-100 shadow-lg">
                            <img src="{{ asset('img/horda.jpg') }}" alt="Horda" class="img-fluid" loading="lazy">
                            <div class="mode-card-body p-4">
                                <h3 class="h4">Horda</h3>
                                <p class="mb-0">Forma equipo con amigos para resistir oleadas de enemigos cada vez más
                                    desafiantes.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section id="trailer" class="py-5 bg-black text-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="text-center mb-5">Tráiler Oficial De Gears Of War E-Day</h2>
                        <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/EC20gLfUHeA?si=LzGcKiNvuHK_z-tZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>    
</div>
@endsection