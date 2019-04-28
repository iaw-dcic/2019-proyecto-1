<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTable([
            'users',
            'lists',
            'items',
        ]);

        // $this->call(UsersTableSeeder::class);
        //Registro el seeder UserSeeder
        $this->call(UserSeeder::class);
        $this->call(ListSeeder::class);
        $this->call(ItemSeeder::class);
    }

    /**Me va a permitir vaciar la tabla para que no haya errores.
     * Para vaciar la tabla tengo que desactivar momentaneamente la revision de claves foráneas.
     * array con el nombre de las tablas que se quiere vaciar.
     */
    protected function truncateTable(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    }

}
