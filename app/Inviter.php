<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inviter extends Model
{
    protected $fillable = [
      'idPerusahaan', 'idUser', 'perusahaan', 'name', 'subjek', 'message'
    ];
}
