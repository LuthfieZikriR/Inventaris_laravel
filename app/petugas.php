<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $fillable = ['nama_petugas', 'username', 'password', 'id_level'];
}
