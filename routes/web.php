<?php
use App\Http\Controllers\Catalogo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas públicas
Route::get('/',[Catalogo::class,'prime']);
Route::get('/login', [Catalogo::class, 'login'])->name('Login');
Route::get('/registro',[Catalogo::class,'Registro'])->name('Registro');
Route::post('/login', [Catalogo::class, 'validarLogin'])->name('login.usuario');
Route::post('/registro', [Catalogo::class, 'guardarUsuario'])->name('registro.guardar');

// Logout
Route::post('/logout', function () {
    \Illuminate\Support\Facades\Session::flush();
    return redirect()->route('Login');
})->name('logout');

// Rutas protegidas
Route::middleware(['verificar.sesion'])->group(function () {
    Route::get('/inicio',[Catalogo::class,'inicio'])->name('Inicio');
    Route::get('/agregar',[Catalogo::class,'agregar'])->name('Agregar');
    Route::get('/listado',[Catalogo::class,'listado'])->name('Listado');
    Route::get('/welcome',[Catalogo::class,'welcome'])->name('Welcome');

    Route::get('/editar/{id}', [Catalogo::class, 'editar'])->name('catalogo.editar');
    Route::post('/editar/{id}', [Catalogo::class, 'actualizar'])->name('catalogo.actualizar');
    Route::put('/catalogo/{id}/actualizar', [Catalogo::class, 'actualizar'])->name('catalogo.actualizar');
    Route::delete('/catalogo/{id}', [Catalogo::class, 'eliminar'])->name('catalogo.eliminar');

    Route::post('/agregar', [Catalogo::class, 'guardar'])->name('GuardarPelicula');
});
