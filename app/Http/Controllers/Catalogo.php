<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Catalogos;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    public function prime(){
        return view("home",["titulo"=>"Home"]);
    }
    
    public function registro() {
        if (session()->has('usuario_id')) {
            return redirect()->route('Inicio');
        }
    
        return view("registro", ["titulo" => "Registro"]);
    }
    public function login() {
        if (session()->has('usuario_id')) {
            return redirect()->route('Inicio');
        }
    
        return view('login', ["titulo" => "Login"]);
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

    return redirect()->route('Listado')->with('success', 'Película agregada exitosamente.');
    }

public function editar($id)
{
    $pelicula = Catalogos::findOrFail($id);
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

public function guardarUsuario(Request $request)
{
    // Validación básica
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido_paterno' => 'required|string|max:255',
        'apellido_materno' => 'required|string|max:255',
        'usuario' => 'required|string|max:255|unique:usuarios,Usuario',
        'correo' => 'required|email|max:255|unique:usuarios,Correo',
        'password' => 'required|string|min:6',
    ]);

    // Crear el usuario
    $usuario = new Usuario();
    $usuario->Nombre = $request->nombre;
    $usuario->Apellido_P = $request->apellido_paterno;
    $usuario->Apellido_M = $request->apellido_materno;
    $usuario->Usuario = $request->usuario;
    $usuario->Correo = $request->correo;
    $usuario->Password = Hash::make($request->password); // Encriptar contraseña
    $usuario->save();

    return redirect()->route('Registro')->with('success', '¡Usuario registrado exitosamente!');
}

public function validarLogin(Request $request) {
    $request->validate([
        'usuario' => 'required|string',
        'password' => 'required|string',
    ]);

    $usuario = Usuario::where('Usuario', $request->usuario)
                ->orWhere('Correo', $request->usuario)
                ->first();

    if ($usuario && Hash::check($request->password, $usuario->Password)) {
        Session::put('usuario_id', $usuario->id);
        Session::put('usuario_nombre', $usuario->Nombre);

        return redirect()->route('Inicio')->with('success', '¡Bienvenido!');
    } else {
        return back()->withErrors(['Login' => 'Credenciales incorrectas']);
    }
}

}