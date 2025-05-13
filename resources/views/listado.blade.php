@extends('plantilla')

@section('titulo', 'Listado de Películas')

@section('contenido')

<section class="bg-black text-white py-10">
    <div class="container mx-auto text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Listado de Películas</h1>
        <p class="text-lg mb-6">Explora todas las películas disponibles.</p>
    </div>


    <table class="table table-striped text-white">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Título</th>
                <th scope="col">Género</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Director</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($peliculas as $pelicula)
    <tr>
        <td>{{ $pelicula->id }}</td>
        <td>{{ $pelicula->Titulo }}</td>
        <td>{{ $pelicula->Genero }}</td>
        <td>{{ $pelicula->Descripcion }}</td>
        <td>{{ $pelicula->Director }}</td>
        <td>
            <a href="{{ route('catalogo.editar', $pelicula->id) }}" class="btn btn-warning">Editar</a>

            <form action="{{ route('catalogo.eliminar', $pelicula->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta película?')" class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
@endforeach

        </tbody>
    </table>


</section>

@endsection