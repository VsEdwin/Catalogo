@extends('plantilla')

@section('contenido')

<section class="prime-video-hero">
    <div class="hero-content">
        <h1 class="hero-title">
            Películas, programas de televisión y mucho más
        </h1>
        <p class="hero-description">
            Disfruta de series, películas y envío gratuito en millones de productos por
            <strong>$99MXN</strong> al mes, o ahorra 24% con la suscripción anual de
            <strong>$899MXN</strong>. Mira sin anuncios por un extra de <strong>$50MXN/mes</strong>.
        </p>

        <div class="hero-buttons">
            <button class="button primary">
                ¿Ya eres miembro? Inicia sesión
            </button>

            <div class="button-separator">
                <span>o</span>
            </div>

            <button class="button secondary">
                Comienza tu prueba gratuita de 30 días*
            </button>
        </div>

        <p class="hero-legal-text">
            *Sólo se aplica con una tarjeta de crédito o débito. Cancela en cualquier momento.<br>
            Aprende más sobre cómo pagar tu suscripción Prime y Channels con efectivo.<br>
            También puedes pagar tu membresía con una tarjeta de regalo Amazon.
        </p>
    </div>

    <aside class="thumbnail-bar">
        <div class="thumbnail-container">
            <img src="{{ asset('img/barbie.jpg') }}" alt="Barbie" class="thumbnail">
            <img src="{{ asset('img/invencible.jpg') }}" alt="Invencible" class="thumbnail">
            <img src="{{ asset('img/mario.jpg') }}" alt="Mario" class="thumbnail">
            </div>
    </aside>
</section>

@endsection