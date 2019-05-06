<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $fillable = ['nip','nama_pegawai','username','password','alamat'];
}
