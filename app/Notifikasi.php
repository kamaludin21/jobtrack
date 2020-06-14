<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $fillable = [
        'idStakeholder', 'ticket', 'content', 'status'
    ];
}
