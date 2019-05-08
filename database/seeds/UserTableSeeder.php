<?php

use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'first_name' => 'System',
            'username'   => 'admin',
            'email'      => 'postmaster@domain.com',
            'password'   =>  Hash::make('secret')
        ]);
    }

}
