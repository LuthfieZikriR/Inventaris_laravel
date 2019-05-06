<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    protected $fillable = ['nama_ruang' , 'kode_ruang', 'keterangan'];
}
