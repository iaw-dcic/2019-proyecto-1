<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bronx',
            'email' => 'bronx@gmail.com',
            'password' => bcrypt('bronx'),
        ]);
        DB::table('users')->insert([
            'name' => 'Columbus',
            'email' => 'columbus@gmail.com',
            'password' => bcrypt('columbus'),
        ]);
        DB::table('users')->insert([
            'name' => 'Mulaika',
            'email' => 'mulaika@gmail.com',
            'password' => bcrypt('mulaika'),
        ]);
        DB::table('users')->insert([
            'name' => 'Wirkonnen',
            'email' => 'wirkonnen@gmail.com',
            'password' => bcrypt('wirkonnen'),
        ]);

    }
}
