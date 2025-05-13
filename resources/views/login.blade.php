@extends('plantilla')
@section('titulo', 'Iniciar Sesión')

@section('contenido')

<div class="form-container">
    <div class="login-header">
        <!-- <img src="{{ asset('img/Steam_icon.png') }}" alt="Steam Logo" class="login-logo"> -->
        <h1>Iniciar sesión</h1>
    </div>

    {{-- Mostrar mensaje de error si existe --}}
    @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif


    {{-- Formulario funcional usando 'usuario' --}}
    <form method="POST" action="{{ route('login.usuario') }}">
        @csrf
        <div class="mb-3">
            <label for="usuario" class="form-label">Nombre de usuario</label>
            <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Introduce tu nombre de usuario" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Introduce tu contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
        <div class="form-group mt-3">
            <a href="{{ route('Registro') }}" class="btn btn-secondary w-100">¿Registrar?</a>
        </div>
    </form>
</div>
@endsection
