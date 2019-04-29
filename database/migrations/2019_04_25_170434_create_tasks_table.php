<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cod');
            $table->string('title');
            $table->string('author');
            $table->string('privacy');
            $table->string('editorial');
            $table->timestamps();
            $table->unsignedBigInteger('owner_id');
            $table->string('owner_name')->nullable();
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::dropIfExists('tasks');
    }
}
