@extends('plantilla')
@section('titulo', 'Registro')

@section('contenido')

<div class="form-container">
    <h2>Formulario de Registro</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups! Hubo algunos errores:</strong>
            <ul style="margin-left: 1.5rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registro.guardar') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ old('apellido_paterno') }}">
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" name="apellido_materno" id="apellido_materno" value="{{ old('apellido_materno') }}">
        </div>

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="{{ old('usuario') }}">
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" value="{{ old('correo') }}">
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
        </div>

        <div class="form-actions">
            <button type="submit">Registrarse</button>
        </div>
    </form>
</div>

@endsection