@extends('plantilla')

@section('contenido')
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    /* .hero {
        background-color: blueviolet;
        color: #90e0ef;
        padding: 60px 20px;
        text-align: center;
    } */

    .hero h1 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 18px;
        max-width: 700px;
        margin: 0 auto 0 auto;
    }

    /* .streaming-section {
        background-color: #000;
        padding: 60px 20px;
        margin-top: 40px;
    } */

    .streaming-grid {
        display: grid; 
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        justify-items: center;
        max-width: 900px;
        margin: 0 auto;
    }

    .service-box {
        background: linear-gradient(to right, #0077b6, #90e0ef);
        color: white;
        width: 180px;
        height: 100px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 16px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
</style>

<section class="hero">
    <h1>Tus servicios de streaming favoritos, todo en una sola aplicación.</h1>
    <p>Los clientes de Delta pueden suscribirse y ver otros servicios de streaming sin salir de la app. 
    Prueba servicios seleccionados durante 7 días gratis y disfruta todo en un solo lugar.</p>
</section>


<section class="streaming-section">
    <div class="streaming-grid">
        <div class="service-box">ViX Premium</div>
        <div class="service-box">Max</div>
        <div class="service-box">Paramount+</div>
        <div class="service-box">Apple TV+</div>
        <div class="service-box">FOX Sports</div>
        <div class="service-box">MGM+</div>
        <div class="service-box">Universal+</div>
        <div class="service-box">Sony One</div>
        <div class="service-box">NBA League Pass</div>
    </div>
</section>
@endsection
