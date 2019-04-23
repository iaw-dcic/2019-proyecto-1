<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->unsignedBigInteger('song_id')->primary();
            $table->string('song_name');
            $table->string('artist');
            $table->string('album');
            $table->integer('release_year');
            $table->string('notes');
            $table->unsignedBigInteger('list_id');
            $table->timestamps();
        });

        Schema::table('songs', function($table) {
            $table->foreign('list_id')->references('list_id')->on('all_tables');
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
