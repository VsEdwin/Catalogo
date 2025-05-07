<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogos extends Model
{
    use HasFactory;
    protected $table = "catalogo";
    protected $fillable = [
        'Titulo', 'Descripcion', 'Genero', 'Director', 'fecha_estreno'
    ];
    public $timestamps = false; 
}
