<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_info', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->string('name')->nullable($value=false);
            $table->boolean('public');
            $table->string('description');
            $table->engine = 'InnoDB';
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_info');
    }
}
