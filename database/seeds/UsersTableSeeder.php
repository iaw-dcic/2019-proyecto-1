<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'jonathan',
            'surname' => 'fritz',
            'username' => 'jonii',
            'email' => 'fritz@gmail.com',
            'password' => bcrypt('12345678'),
            'telephone' => '123456',
            'address' => 'dirección 123',
        ]);
    }
}
