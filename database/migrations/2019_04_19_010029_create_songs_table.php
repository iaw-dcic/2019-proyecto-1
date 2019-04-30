<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('song_id');
            $table->string('song_name');
            $table->string('artist');
            $table->string('album');
            $table->integer('release_year');
            $table->string('notes')->nullable();
            $table->integer('list_id',false,true);
            $table->timestamps();
        });

        Schema::table('songs', function($table) {
            $table->foreign('list_id')->references('list_id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}