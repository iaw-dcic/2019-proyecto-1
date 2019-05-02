<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCarpetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Storage::makeDirectory('users');
        Storage::makeDirectory('photos');
        Storage::makeDirectory('images');

        $fondo_1 = file('http://www.lorempixel.com/1366/768/food/');
        $fondo_2 = file('http://www.lorempixel.com/1366/768/nature/');
        $fondo_3 = file('http://www.lorempixel.com/1366/768/nightlife/');
        $background_login = file('http://www.lorempixel.com/1366/768/nature/');
        $background_register = file('http://www.lorempixel.com/1366/768/nature/');
        $no_photo = file('https://i0.wp.com/editorial.upc.edu.pe/wp-content/uploads/2018/08/no-photo.png');
        file_put_contents(public_path('storage\\users\\').'no_photo.png', $no_photo);
        file_put_contents(public_path('storage\\images\\').'fondo_1.jpg', $fondo_1);
        file_put_contents(public_path('storage\\images\\').'fondo_2.jpg', $fondo_2);
        file_put_contents(public_path('storage\\images\\').'fondo_3.jpg', $fondo_3);
        file_put_contents(public_path('storage\\images\\').'background-login.jpg', $background_login);
        file_put_contents(public_path('storage\\images\\').'background-register.jpg', $background_register);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
