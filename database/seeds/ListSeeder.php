<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            'name' => 'Cervezas disponibles',
            'isPublic?' => true,
        ]);
        DB::table('lists')->insert([
            'name' => 'Mis cervezas favoritas',
            'isPublic?' => false,
        ]);
        DB::table('lists')->insert([
            'name' => 'Cervezas rojas en stock',
            'isPublic?' => true,
        ]);





    }
}
