<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaUsuariosTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_lista');
            $table->integer('idUsuario')->unsigned();
            $table->string('publica');
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
        Schema::dropIfExists('lista_usuarios');
    }
}
