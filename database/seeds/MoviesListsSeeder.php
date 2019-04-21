<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies_lists')->insert([
            'name' => 'Lista A',
            'user_id'=> DB::table('users')->whereName('Constanza')->value('id'),
            'movie_id' => DB::table('movies')->whereName('Bambi')->value('id'),
            'movie_id' => DB::table('movies')->whereName('La Cenicienta')->value('id'),
        ]);

        DB::table('movies_lists')->insert([
            'id'=>DB::table('movies_lists')->whereName('Lista A')->value('id'),
            'name' => 'Lista A',
            'user_id'=> DB::table('users')->whereName('Constanza')->value('id'),
            'movie_id' => DB::table('movies')->whereName('Bambi')->value('id'),
            'movie_id' => DB::table('movies')->whereName('La Cenicienta')->value('id'),
        ]);

    }
}
