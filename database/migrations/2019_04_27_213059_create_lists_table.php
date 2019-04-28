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
            $table->increments('id');
            $table->string('name');

            $table->UnsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');

            $table->UnsignedInteger('item_id')->nullable();
            $table->foreign('item_id')->references('item_id')->on('items');

            $table->boolean('isPublic?');



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
