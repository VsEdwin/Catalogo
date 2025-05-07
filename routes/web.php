<?php

use App\Http\Controllers\Catalogo;
use Illuminate\Support\Facades\Route;


Route::get('/inicio',[Catalogo::class,'inicio'])->name('Inicio');
Route::get('/editar',[Catalogo::class,'editar'])->name('Editar');
Route::get('/agregar',[Catalogo::class,'agregar'])->name('Agregar');
Route::get('/listado',[Catalogo::class,'listado'])->name('Listado');
Route::get('/welcome',[Catalogo::class,'welcome'])->name('Welcome');
Route::get('/',[Catalogo::class,'home']);

Route::post('/agregar', [Catalogo::class, 'guardar'])->name('GuardarPelicula');
Route::get('/editar/{id}', [Catalogo::class, 'editar'])->name('catalogo.editar');

// // Mostrar el formulario de edición
// Route::get('/editar/{id}', [Catalogo::class, 'editar'])->name('catalogo.editar');

Route::post('/editar/{id}', [Catalogo::class, 'actualizar'])->name('catalogo.actualizar');

Route::put('/catalogo/{id}/actualizar', [Catalogo::class, 'actualizar'])->name('catalogo.actualizar');

Route::delete('/catalogo/{id}', [Catalogo::class, 'eliminar'])->name('catalogo.eliminar');
