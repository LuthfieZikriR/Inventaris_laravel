<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventaris extends Model
{
    protected $fillable = ['nama', 'kondisi', 'keterangan','stok','jumlah','id_jenis', 'id_ruang', 'kode_inventaris', 'id_petugas',];
}
