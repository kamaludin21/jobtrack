<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
      'idUser', 'description', 'Ttl', 'alamat', 'Agama', 'kelamin', 'email', 'telp', 'social1', 'social2'
    ];
}
