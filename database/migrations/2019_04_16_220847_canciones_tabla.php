<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CancionesTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lista_id') -> unsigned();
            $table->string('nombre');
           // $table->time('duracion');
            $table->string('album');
            $table->string('autor');
            $table->date('fecha_lanzamiento')->default('1111-11-11'); //aaaa-mm-dd
            $table->timestamps();

            //relacion constraint
            $table->foreign('lista_id')->references('id')->on('listas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canciones');
    }
}
