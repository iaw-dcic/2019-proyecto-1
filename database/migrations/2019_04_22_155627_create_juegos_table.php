<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->index()->nullable($value=false)->unique();
            $table->string('genre');
            $table->string('company');
            $table->date('release_date');
            $table->engine = 'InnoDB';
            $table->unsignedInteger('list_id');
            $table->foreign('list_id')->references('id')->on('listas')->onDelete('cascade');
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
