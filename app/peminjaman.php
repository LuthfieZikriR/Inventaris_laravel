<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $fillable = ['tanggal_pinjam', 'tanggal_kembali', 'status_peminjaman', 'id_pegawai'];
}
