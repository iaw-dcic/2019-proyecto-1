<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $usuario = new User();
        $usuario->id="12345";
        $usuario->name = "Pepe";
        $usuario->email = "sapo@pepe.com";
        $usuario->password = bcrypt('sapopepe');

        $usuario->save();
    }
}
