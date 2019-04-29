<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Joaquin Montero',
        	'email' => 'joaco@joaco.com',
        	'biografia' => 'Hola Soy Joaquin Montero',
        	'password' => 'password11',
        ]);

        DB::table('users')->insert([
        	'name' => 'Constanza Giorgetti',
        	'email' => 'coti@gmail.com',
        	'biografia' => 'Hola soy coti la mejor',
        	'password' => 'password12',
        ]);

        DB::table('users')->insert([
        	'name' => 'Micaela Melo',
        	'email' => 'miklamas@gmail.com',
        	'biografia' => 'Hola Soy la mas mejor',
        	'password' => 'password13',
        ]);

        DB::table('users')->insert([
        	'name' => 'Fede Virkel',
        	'email' => 'fexe123@gmail.com',
        	'biografia' => 'Hola soy un monigote',
        	'password' => 'password14',
        ]);

        //meto las listasss
        DB::table('listas')->insert([
        	'userid' => '1',
        	'nombre' => 'lista1joaco',
        	
        ]);

        DB::table('listas')->insert([
        	'userid' => '1',
        	'nombre' => 'lista2joaco',
            'visible' => false,
        	
        ]);
        DB::table('listas')->insert([
        	'userid' => '1',
        	'nombre' => 'lista3joaco',
        	
        ]);
        DB::table('listas')->insert([
        	'userid' => '1',
        	'nombre' => 'lista4joaco',
        	
        ]);
        DB::table('listas')->insert([
        	'userid' => '1',
        	'nombre' => 'lista5joaco',
        	
        ]);

        DB::table('listas')->insert([
        	'userid' => '2',
        	'nombre' => 'lista1coti',
        	
        ]);
        DB::table('listas')->insert([
        	'userid' => '2',
        	'nombre' => 'lista2coti',
        	
        ]);
        DB::table('listas')->insert([
        	'userid' => '3',
        	'nombre' => 'lista1mica',
        	
        ]);
        DB::table('listas')->insert([
        	'userid' => '4',
        	'nombre' => 'lista1feche',
        	
        ]);

        //peliculas

        //lista1joaco
        DB::table('peliculas')->insert([
        	'listaid' => '1',
        	'nombre' => 'wosito',
        	'descripcion' => 'la ds3 es el que te saca el stress',
        	'genero' => 'Terror',
        	
        ]);
        DB::table('peliculas')->insert([
        	'listaid' => '1',
        	'nombre' => 'wosito2',
        	'descripcion' => 'la ds3 es el que te saca el stress',
        	'genero' => 'Terror',
        	
        ]);
        DB::table('peliculas')->insert([
        	'listaid' => '1',
        	'nombre' => 'wosito3',
        	'descripcion' => 'la ds3 es el que te saca el stress',
        	'genero' => 'Terror',
        	
        ]);

        //lista2joaco
        DB::table('peliculas')->insert([
        	'listaid' => '2',
        	'nombre' => 'papo',
        	'descripcion' => 'La bestia del Hardcore',
        	'genero' => 'Terror',
        	
        ]);
		DB::table('peliculas')->insert([
        	'listaid' => '2',
        	'nombre' => 'papo',
        	'descripcion' => 'La bestia del Hardcore',
        	'genero' => 'Terror',
        	
        ]);

        //lista3joaco
        DB::table('peliculas')->insert([
        	'listaid' => '3',
        	'nombre' => 'replik',
        	'descripcion' => 'Dijo nada para decir nada',
        	'genero' => 'Terror',
        	
        ]); 
        //lista4joaco
        DB::table('peliculas')->insert([
        	'listaid' => '4',
        	'nombre' => 'Cacha',
        	'descripcion' => 'Soy Houdini todo un escapista',
        	'genero' => 'Terror',
        	
        ]);       

        //lista5joaco
        DB::table('peliculas')->insert([
        	'listaid' => '5',
        	'nombre' => 'ACZINO',
        	'descripcion' => 'te quitas el micro',
        	'genero' => 'Terror',
        	
        ]);


        //lista1coti
        DB::table('peliculas')->insert([
        	'listaid' => '6',
        	'nombre' => 'sub',
        	'descripcion' => 'vos no te pases de pillo',
        	'genero' => 'Terror',
        	
        ]);
        //lista2coti
        DB::table('peliculas')->insert([
        	'listaid' => '7',
        	'nombre' => 'sub2',
        	'descripcion' => 'ahora el triple tempo esta atacando denuevo',
        	'genero' => 'Terror',
        	
        ]);
        DB::table('peliculas')->insert([
        	'listaid' => '7',
        	'nombre' => 'teorema',
        	'descripcion' => 'pimpimpim',
        	'genero' => 'Terror',
        	
        ]);
        //lista1mica
        DB::table('peliculas')->insert([
        	'listaid' => '8',
        	'nombre' => 'dtoke',
        	'descripcion' => 'todos pensamos una rima esa es la receta pero nadie se escribe una cancion completa',
        	'genero' => 'Terror',
        	
        ]);
        //lista1feche
        DB::table('peliculas')->insert([
        	'listaid' => '9',
        	'nombre' => 'papo',
        	'descripcion' => 'dicen que cacha me la agita con su facha viednamita',
        	'genero' => 'Terror',
        	
        ]);

    }
}
