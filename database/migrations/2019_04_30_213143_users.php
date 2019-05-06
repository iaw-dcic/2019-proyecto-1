<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string("username",24)->unique()->nullable(false);
            $table->string('name', 48)->nullable(false);
            $table->string('email', 48)->unique()->nullable(false);
            $table->string('password', 256)->nullable(true);
            $table->string("photo_url",300)->nullable(true);
            $table->string("photo_id",300)->nullable(true);
            $table->string("phone",32)->unique()->nullable(true);
            $table->string("biography",240)->nullable(true);
            $table->boolean("active")->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('provider_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('users');
    }
}
