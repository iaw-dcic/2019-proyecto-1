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
            'nombre' => 'Leche',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Berenjena',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Morron',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Cebolla',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Cebolla verdeo',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Queso',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Crema',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Carne',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Pollo',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Pescado',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Choclo',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Panceta',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Roquefort',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Disco tarta',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Tomate',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Albahaca',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Especias',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Pure tomate',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Zapallo',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Zapallito',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Avena',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Coco rallado',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Cacao',
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Dulce de leche',
        ]);
    }
}
