<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Lista;
use \App\User;


class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Obtengo el id del usuario Bronx.
        $user_id = User::where('name','Bronx')->value('user_id');
        Lista::create([
            'name' => 'Cervezas disponibles',
            'isPublic?' => true,
            'user_id' => $user_id,
        ]);
        // DB::table('lists')->insert([
        //     'name' => 'Cervezas disponibles',
        //     'isPublic?' => true,
        // ]);
        Lista::create([
            'name' => 'Mis cervezas favoritas',
            'isPublic?' => false,
        ]);
        Lista::create([
            'name' => 'Cervezas rojas en stock',
            'isPublic?' => true,
        ]);





    }
}
