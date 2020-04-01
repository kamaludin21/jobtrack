<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
      'idUser', 'title', 'instansi', 'description', 'dari', 'sampai', 'image1', 'image2'
    ];
}
