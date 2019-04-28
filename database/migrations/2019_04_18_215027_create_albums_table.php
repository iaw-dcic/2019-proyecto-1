<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('list_id');
            $table->string('list_name');
            $table->string('owner');
            $table->boolean('public')->default(1);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('albums', function($table) {
            $table->foreign('owner')->references('name')->on('users')->onDelete('cascade');
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