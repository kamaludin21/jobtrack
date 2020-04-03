<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $fillable = [
      'idUser', 'name', 'status', 'alamat', 'website', 'profil', 'sampul', 'description', 'bidang'
    ];
}
