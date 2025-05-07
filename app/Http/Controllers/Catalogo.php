<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogos;

class Catalogo extends Controller
{
    public function inicio(){
        return view("inicio",["titulo"=>"Prime Video"]);
    }
    // public function editar(){
    //     return view("editar",["titulo"=>"Editar Pelicula"]);
    // }
    public function agregar(){
        return view("agregar",["titulo"=>"Agregar Pelicula"]);
    }
    // public function listado(){
    //     // $consulta = new Catalogo();
    //     // $consulta = Catalogos::all();
    //     $consulta = Catalogos::select("Titulo","Descripcion")->get();
    //     $datos = $consulta;
    //     return view("listado",["titulo"=>"Listado"]);
    // }

    public function listado() {
        $peliculas = Catalogos::all(); // obtenemos todas las películas
        return view("listado", [
            "titulo" => "Listado de Películas",
            "peliculas" => $peliculas
        ]);
    }
    
    public function welcome(){
        return view("welcome",["titulo"=>"Welcome"]);
    }
    public function home(){
        return view("home",["titulo"=>"Home"]);
    }
    

    public function guardar(Request $request){
    // Validar datos (opcional pero recomendado)
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'genero' => 'required|string|max:255',
        'director' => 'required|string|max:255',
        'fecha_estreno' => 'required|date',
    ]);

    // Guardar en base de datos
    Catalogos::create([
        'Titulo' => $request->input('titulo'),
        'Descripcion' => $request->input('descripcion'),
        'Genero' => $request->input('genero'),
        'Director' => $request->input('director'),
        'fecha_estreno' => $request->input('fecha_estreno'),
    ]);

    // Redirigir con mensaje
    return redirect()->route('Listado')->with('success', 'Película agregada exitosamente.');
    }

public function editar($id)
{
    $pelicula = Catalogos::findOrFail($id); // obtenemos la película por su ID
    return view('editar', compact('pelicula'),["titulo"=>"Agregar Pelicula"]);
}

public function actualizar(Request $request, $id)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'genero' => 'required|string',
        'director' => 'required|string',
        'fecha_estreno' => 'required|date',
    ]);

    $pelicula = Catalogos::findOrFail($id);
    $pelicula->Titulo = $request->titulo;
    $pelicula->Descripcion = $request->descripcion;
    $pelicula->Genero = $request->genero;
    $pelicula->Director = $request->director;
    $pelicula->fecha_estreno = $request->fecha_estreno;
    $pelicula->save();

    return redirect()->route('Listado')->with('success', 'Película actualizada correctamente.');
}

public function eliminar($id)
{
    $pelicula = Catalogos::find($id);

    if (!$pelicula) {
        return redirect()->route('Listado')->with('error', 'Película no encontrada.');
    }

    $pelicula->delete();

    return redirect()->route('Listado')->with('success', 'Película eliminada correctamente.');
}

}