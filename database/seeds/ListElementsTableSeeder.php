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
        factory('Listbook\ListElement', 200)->create();
    }
}
