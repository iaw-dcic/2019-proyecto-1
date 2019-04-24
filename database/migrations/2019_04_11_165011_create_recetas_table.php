<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recetas', function (Blueprint $table) {
           
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('pasos');
            $table->unsignedBigInteger('id_autor');
            $table->unsignedBigInteger('lista_id');
            $table->foreign('id_autor')->references('id')->on('users');
            $table->foreign('lista_id')->references('id')->on('listas_de_recetas');
            $table->primary(['nombre']);
            $table->primary(['nombre','lista_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas');
    }
}
