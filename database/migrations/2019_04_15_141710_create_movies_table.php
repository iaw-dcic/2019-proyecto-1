<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			$table->string('titulo', 100);
			$table->string('director', 100);
			
			$table->unsignedBigInteger('lista'); 
			
            $table->timestamps();
        });
		
		   Schema::table('movies', function (Blueprint $table) {
           
			$table->foreign('lista')->references('id')->on('usermovies');
		//	$table->foreign('movies_id')->references('id')->on('movies');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
		Schema::drop('movies');
		Schema::enableForeignKeyConstraints();
    }
}
