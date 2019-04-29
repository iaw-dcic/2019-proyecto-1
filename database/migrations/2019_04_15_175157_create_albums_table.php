<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            //chequeo correspondiente a ver si existe... herencia y demas cosas a refaccionar
            //en siguientes versiones...
            $table->string('name', 100);
            $table->string('bandName', 100);	
            $table->integer('user_id');	
            $table->text('description');
            //Link a  youtube...
            $table->text('link');
            $table->boolean('public')->default(1);	
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
        Schema::dropIfExists('albums');
    }
}
