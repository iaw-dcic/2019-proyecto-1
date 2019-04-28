<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'nombre_beer' => 'IPA',
            'color' => 'palida',
            'gradoAlcohol' => 6.7,
            'gradoAmargor' => 15,
        ]);
        DB::table('items')->insert([
            'nombre_beer' => 'SCOTCH',
            'color' => 'roja',
            'gradoAlcohol' => 6,
            'gradoAmargor' => 12,
        ]);
        DB::table('items')->insert([
            'nombre_beer' => 'HONEY',
            'color' => 'rubia',
            'gradoAlcohol' => 5.5,
            'gradoAmargor' => 10,
        ]);
    }
}
