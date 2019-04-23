<?php

use Illuminate\Database\Seeder;

class ListElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ListElement', 40)->create();
    }
}
