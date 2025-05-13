<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Catalogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('catalogo',function(Blueprint $table){
            $table->id();
            $table->string('Titulo');
            $table->string('Descripcion');
            $table->string('Genero');
            $table->string('Director');
            $table->date('fecha_estreno');
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
