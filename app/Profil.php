<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
      'idUser', 'description', 'ttl', 'alamat', 'agama', 'kelamin', 'email', 'telp', 'social1', 'social2', 'status', 'profil', 'gaji'
    ];

}
