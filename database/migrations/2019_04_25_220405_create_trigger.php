<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER increase_Like AFTER INSERT ON `likes` FOR EACH ROW
            BEGIN
                UPDATE listas SET likes= likes+1 WHERE id=NEW.list_id;
            END
        ');

        DB::unprepared('
        CREATE TRIGGER decrease_Like AFTER DELETE ON `likes` FOR EACH ROW
            BEGIN
                UPDATE listas SET likes= likes-1 WHERE id=OLD.list_id;
            END
        ');
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `increase_Like`');
        DB::unprepared('DROP TRIGGER `decrease_like`');
    }
}
