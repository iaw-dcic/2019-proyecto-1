<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_movie', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('nombre');
			
			$table->unsignedBigInteger('creador_id'); 
			 
			$table->unsignedBigInteger('movies_id'); 
			
			
            $table->timestamps();
        });
		
		   Schema::table('user_movie', function (Blueprint $table) {
           
			$table->foreign('creador_id')->references('id')->on('users');
			$table->foreign('movies_id')->references('id')->on('movies');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['creador_id']);
            $table->dropColumn('creador_id');
			$table->dropForeign(['movies_id']);
            $table->dropColumn('movies_id');
        });
    }
}
