<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->bigIncrements('list_id');
            $table->string('list_name');
            //$table->foreign(['list_id','list_name'])->references(['list_id','list_name'])->on([]);
            $table->bigIncrements('song_id');
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
        Schema::dropIfExists('lists');
    }
}
