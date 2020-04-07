<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $fillable = [
      'ticket', 'idUser', 'status', 'idPerusahaan'
    ];
}
