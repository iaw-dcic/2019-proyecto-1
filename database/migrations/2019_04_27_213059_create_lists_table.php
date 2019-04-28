<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\User;

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
            $table->foreign('user_id')->references('id')->on('users');

            $table->UnsignedInteger('item_id')->nullable();
            $table->foreign('item_id')->references('item_id')->on('items');

            $table->boolean('isPublic')->default(false);



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
