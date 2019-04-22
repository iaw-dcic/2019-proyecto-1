<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicListInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_list_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('list_number')->nullable();
            $table->boolean('public');
            $table->engine = 'InnoDB';
        });

        Schema::table('public_list_info', function($table) {
            $table->foreign('list_number')->references('id')->on('list_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_list_info');
    }
}
