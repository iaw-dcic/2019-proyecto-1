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
        $user_id = User::where('name','Bronx')->value('id');
        Lista::create([
            'name' => 'Cervezas disponibles',
            'isPublic' => true,
            'user_id' => $user_id,
        ]);
        Lista::create([
            'name' => 'Cervezas mas vendidas',
            'isPublic' => true,
            'user_id' => $user_id,
        ]);

        /**Genero listas de prueba de forma automaticante con factory */
        factory(Lista::class)->create();

        // DB::table('lists')->insert([
        //     'name' => 'Cervezas disponibles',
        //     'isPublic?' => true,
        // ]);
        Lista::create([
            'name' => 'Mis cervezas favoritas',
        ]);
        Lista::create([
            'name' => 'Cervezas rojas en stock',
            'isPublic' => true,
        ]);





    }
}
