<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Constanza',
            'email'=>'cotig@gmail.com',
            'password' => bcrypt('coti123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Micaela',
            'email' => 'micam@gmail.com',
            'password'=>bcrypt('mica123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Joaco',
            'email'=>'joacom@gmail.com',
            'password' => bcrypt('joaco123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Federico',
            'email'=>'fedev@gmail.com',
            'password' => bcrypt('fede123'),
        ]);
    }
}
