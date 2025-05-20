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


    public function guardar(Request $request) {
    $request->validate([
        'titulo'        => 'required|string|min:2|max:255',
        'descripcion'   => 'required|string|min:10',
        'genero'        => 'required|string|max:100|regex:/^[\pL\s]+$/u',
        'director'      => 'required|string|max:100|regex:/^[\pL\s]+$/u',
        'fecha_estreno' => 'required|date|before_or_equal:today',
    ], [
        // TÍTULO
        'titulo.required' => 'El campo Título es obligatorio.',
        'titulo.min'      => 'El título debe tener al menos :min caracteres.',
        'titulo.max'      => 'El título no puede tener más de :max caracteres.',

        // DESCRIPCIÓN
        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.min'      => 'La descripción debe tener al menos :min caracteres.',

        // GÉNERO
        'genero.required' => 'El campo Género es obligatorio.',
        'genero.regex'    => 'El género solo debe contener letras y espacios.',

        // DIRECTOR
        'director.required' => 'El campo Director es obligatorio.',
        'director.regex'    => 'El nombre del director solo debe contener letras y espacios.',

        // FECHA DE ESTRENO
        'fecha_estreno.required'        => 'La fecha de estreno es obligatoria.',
        'fecha_estreno.date'            => 'La fecha de estreno debe ser válida.',
        'fecha_estreno.before_or_equal' => 'La fecha no puede ser futura.',
    ]);

    Catalogos::create([
        'Titulo'        => $request->input('titulo'),
        'Descripcion'   => $request->input('descripcion'),
        'Genero'        => $request->input('genero'),
        'Director'      => $request->input('director'),
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
        'genero' => 'required|string|max:255',
        'director' => 'required|string|max:255',
        'fecha_estreno' => 'required|date',
    ], [
        'titulo.required' => 'El título es obligatorio.',
        'descripcion.required' => 'La descripción es obligatoria.',
        'genero.required' => 'El género es obligatorio.',
        'director.required' => 'El director es obligatorio.',
        'fecha_estreno.required' => 'La fecha de estreno es obligatoria.',
        'fecha_estreno.date' => 'Debe ser una fecha válida.',
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
    $request->validate([
        'nombre' => 'required|string|min:3|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'apellido_paterno' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'apellido_materno' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'usuario' => 'required|string|max:255|unique:usuarios,Usuario|regex:/^[a-zA-Z0-9_]+$/',
        'correo' => 'required|email|max:255|unique:usuarios,Correo',
        'password' => [
            'required',
            'min:6',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/'
        ],
    ], [
        'nombre.required' => 'El campo Nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',

        'apellido_paterno.required' => 'El campo Apellido Paterno es obligatorio.',
        'apellido_paterno.regex' => 'El apellido paterno solo puede contener letras y espacios.',

        'apellido_materno.required' => 'El campo Apellido Materno es obligatorio.',
        'apellido_materno.regex' => 'El apellido materno solo puede contener letras y espacios.',

        'usuario.required' => 'El campo Usuario es obligatorio.',
        'usuario.unique' => 'Este nombre de usuario ya está en uso.',
        'usuario.regex' => 'El usuario solo puede contener letras, números y guiones bajos (_).',

        'correo.required' => 'El campo Correo es obligatorio.',
        'correo.email' => 'El formato del correo no es válido.',
        'correo.unique' => 'Este correo ya está registrado.',

        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        'password.regex' => 'La contraseña debe incluir al menos una letra minúscula, una mayúscula, un número y un símbolo especial.',
    ]);

    // Crear el usuario
    $usuario = new Usuario();
    $usuario->Nombre = $request->nombre;
    $usuario->Apellido_P = $request->apellido_paterno;
    $usuario->Apellido_M = $request->apellido_materno;
    $usuario->Usuario = $request->usuario;
    $usuario->Correo = $request->correo;
    $usuario->Password = Hash::make($request->password);
    $usuario->save();

    return redirect()->route('Registro')->with('success', '¡Usuario registrado exitosamente!');
}


public function validarLogin(Request $request) {
    $request->validate([
        'usuario' => 'required|string',
        'password' => 'required|string',
    ], [
        'usuario.required' => 'El campo usuario es obligatorio.',
        'password.required' => 'El campo contraseña es obligatorio.',
    ]);

    $usuario = Usuario::where('Usuario', $request->usuario)
                ->orWhere('Correo', $request->usuario)
                ->first();

    if ($usuario && Hash::check($request->password, $usuario->Password)) {
        Session::put('usuario_id', $usuario->id);
        Session::put('usuario_nombre', $usuario->Nombre);

        return redirect()->route('Inicio')->with('success', '¡Bienvenido!');
    } else {
        return back()->withErrors([
            'login' => 'Usuario o contraseña incorrectos.'
        ])->withInput(); // Mantiene lo que el usuario escribió
    }
}


}