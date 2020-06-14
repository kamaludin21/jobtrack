<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    protected $fillable = [
      'idUser', 'keilmuan', 'subkeilmuan', 'pendidikan', 'instansi', 'angkatan'
    ];
}
