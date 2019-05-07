<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CargarDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        App\Genero::create(['genero'=>'Accion']);
        App\Genero::create(['genero'=>'Ciencia ficción']);
        App\Genero::create(['genero'=>'Comedia']);
        App\Genero::create(['genero'=>'Drama']);
        App\Genero::create(['genero'=>'Fantasia']);
        App\Genero::create(['genero'=>'Musical']);
        App\Genero::create(['genero'=>'Romance']);
        App\Genero::create(['genero'=>'Terror']);
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
