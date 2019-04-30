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
        factory('Listbook\UserList', 30)->create();
    }
}
