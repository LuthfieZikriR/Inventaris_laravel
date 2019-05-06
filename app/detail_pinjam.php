<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_pinjam extends Model
{
    protected $fillable = ['id_inventaris', 'stok', 'id_peminjaman'];
}
