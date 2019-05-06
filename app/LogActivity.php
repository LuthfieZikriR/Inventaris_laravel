<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $fillable = ['subject', 'url', 'method', 'ip', 'agent', 'user_id'];
}
