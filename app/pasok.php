<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasok extends Model
{
    protected $fillable = ['kode_inventaris', 'nama', 'jumlah', 'id_petugas'];
}
