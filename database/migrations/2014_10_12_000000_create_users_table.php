<?php
//Todas las clases del laravel tienen Illuminate como nombre de espacio
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration
{
    /**
     * Metodo para crear la tabla de usuarios.
     */
    public function up()
    {
        //users es el nombre de la tabla que quiero crear y coincide con el nombre del archivo.
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); //INTEGER UNSIFNED - AUTOINCREMENT
            $table->string('name'); // VARCHAR
            $table->string('email')->unique(); //VARCHAR - UNIQUE
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Elimina la tabla de usuarios.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
