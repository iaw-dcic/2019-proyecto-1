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
            $table->integer('list_id');
            $table->string('list_name');
            $table->foreign(['list_id','list_name'])->references(['list_id','list_name'])->on(['all_tables', 'all_tables']);
            $table->bigIncrements('song_id')->primary();
            $table->string('song_name');
            $table->string('artist');
            $table->string('album');
            $table->integer('release_year');
            $table->string('notes');
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
        Schema::dropIfExists('songs');
    }
}
