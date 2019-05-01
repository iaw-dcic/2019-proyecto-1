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
            'nombre_club' => 'Boca Juniors',
            'nombre_estadio' => 'La Bombonera',
            'capacidad_estadio' => 49000,
            'pais' => 'Argentina',
        ]);
        // DB::table('items')->insert([
        //     'nombre_beer' => 'IPA',
        //     'color' => 'palida',
        //     'gradoAlcohol' => 6.7,
        //     'gradoAmargor' => 15,
        // ]);
        Item::Create([
            'nombre_club' => 'River Plate',
            'nombre_estadio' => 'El monumental',
            'capacidad_estadio' => 66226,
            'pais' => 'Argentina',
        ]);
        Item::Create([
            'nombre_club' => 'San Lorenzo',
            'nombre_estadio' => 'Nuevo Gasometro',
            'capacidad_estadio' => 47964,
            'pais' => 'Argentina',
        ]);
    }
}
