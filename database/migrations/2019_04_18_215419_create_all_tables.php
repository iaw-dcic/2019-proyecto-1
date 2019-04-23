<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_tables', function (Blueprint $table) {
            $table->bigIncrements('list_id')->unique();
            $table->string('list_name');
            $table->string('owner');
            $table->boolean('public');
            $table->timestamps();
        });

        Schema::table('all_tables', function($table) {
            $table->foreign('owner')->references('name')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_tables');
    }
}
