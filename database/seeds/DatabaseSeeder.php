<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeds\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
    }
}
