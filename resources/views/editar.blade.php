@extends('plantilla')

@section('titulo', 'Editar Película')

@section('contenido')

<section class="edit-movie-hero">
    <div class="hero-content">
        <h1 class="hero-title">Editar Película</h1>
        <p class="hero-description">Modifica la información de la película.</p>
        <a href="{{ route('Listado') }}" class="button secondary">Volver al listado</a>
    </div>
</section>

<div class="form-container">
    <h2 class="form-title">Editar Detalles</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('catalogo.actualizar', $pelicula->id) }}" method="POST" class="movie-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $pelicula->Titulo) }}" class="form-input">
            @error('titulo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea">{{ old('descripcion', $pelicula->Descripcion) }}</textarea>
            @error('descripcion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="genero" class="form-label">Género</label>
            <input type="text" name="genero" id="genero" value="{{ old('genero', $pelicula->Genero) }}" class="form-input">
            @error('genero')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="director" class="form-label">Director</label>
            <input type="text" name="director" id="director" value="{{ old('director', $pelicula->Director) }}" class="form-input">
            @error('director')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_estreno" class="form-label">Fecha de Estreno</label>
            <input type="date" name="fecha_estreno" id="fecha_estreno" value="{{ old('fecha_estreno', $pelicula->fecha_estreno) }}" class="form-input">
            @error('fecha_estreno')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="button primary">Actualizar Película</button>
        </div>
    </form>
</div>

@endsection
