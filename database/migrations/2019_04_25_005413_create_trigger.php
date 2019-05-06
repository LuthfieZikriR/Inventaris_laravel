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
                CREATE TRIGGER tambah_pasok AFTER INSERT ON pasoks FOR EACH ROW
                BEGIN
                UPDATE inventaris SET jumlah = jumlah + NEW.jumlah WHERE
                kode_inventaris = NEW.kode_inventaris;
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
        //
    }
}
