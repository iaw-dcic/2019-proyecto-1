<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Item;



class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::Create([
            'nombre_beer' => 'IPA',
            'color' => 'palida',
            'gradoAlcohol' => 6.7,
            'gradoAmargor' => 15,
        ]);
        // DB::table('items')->insert([
        //     'nombre_beer' => 'IPA',
        //     'color' => 'palida',
        //     'gradoAlcohol' => 6.7,
        //     'gradoAmargor' => 15,
        // ]);
        Item::Create([
            'nombre_beer' => 'SCOTCH',
            'color' => 'roja',
            'gradoAlcohol' => 6,
            'gradoAmargor' => 12,
        ]);
        Item::Create([
            'nombre_beer' => 'HONEY',
            'color' => 'rubia',
            'gradoAlcohol' => 5.5,
            'gradoAmargor' => 10,
        ]);
    }
}
