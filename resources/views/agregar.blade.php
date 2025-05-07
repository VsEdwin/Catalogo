@extends('plantilla')

@section('titulo', 'Agregar Película')

@section('contenido')

    <section class="add-movie-hero">
        <div class="hero-content">
            <h1 class="hero-title">Agregar Nueva Película</h1>
            <p class="hero-description">Completa el siguiente formulario para añadir una nueva película a la plataforma.</p>
        </div>
    </section>

    <div class="form-container">
        <h2 class="form-title">Detalles de la Película</h2>
        <form action="{{ route('GuardarPelicula') }}" method="POST" class="movie-form">
            @csrf

            <div class="form-group">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea" required></textarea>
            </div>

            <div class="form-group">
                <label for="genero" class="form-label">Género</label>
                <input type="text" name="genero" id="genero" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="director" class="form-label">Director</label>
                <input type="text" name="director" id="director" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="fecha_estreno" class="form-label">Fecha de Estreno</label>
                <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-input" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="button secondary">Guardar Película</button>
            </div>
        </form>
    </div>

@endsection