<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_barang extends Model
{
    protected $fillable = ['kode_jenis', 'nama_jenis', 'keterangan'];
}
