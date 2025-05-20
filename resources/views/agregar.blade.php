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

    {{-- Bloque para mostrar errores generales --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('GuardarPelicula') }}" method="POST" class="movie-form">
        @csrf

        <div class="form-group">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-input" value="{{ old('titulo') }}">
            @error('titulo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="genero" class="form-label">Género</label>
            <input type="text" name="genero" id="genero" class="form-input" value="{{ old('genero') }}">
            @error('genero')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="director" class="form-label">Director</label>
            <input type="text" name="director" id="director" class="form-input" value="{{ old('director') }}">
            @error('director')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_estreno" class="form-label">Fecha de Estreno</label>
            <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-input" value="{{ old('fecha_estreno') }}">
            @error('fecha_estreno')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="button secondary">Guardar Película</button>
        </div>
    </form>
</div>

@endsection
