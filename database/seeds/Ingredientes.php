<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Ingredientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredientes')->insert([
            'nombre' => 'Azucar',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Azucar Negra',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Papa',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Azucar Negra',
        ]);
    }
}
