<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->increments('id_inventaris');
            $table->string('kode_inventaris');
            $table->string('nama');
            $table->enum('kondisi', ['Baik', 'Rusak']);
            $table->string('keterangan');
            $table->integer('stok');
            $table->integer('jumlah');
            $table->integer('id_jenis')->unsigned();
            $table->integer('id_ruang')->unsigned();
            $table->integer('id_petugas')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}
