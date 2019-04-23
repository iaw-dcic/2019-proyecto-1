<?php

use Illuminate\Database\Seeder;

class UserListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\UserList', 10)->create();
    }
}
