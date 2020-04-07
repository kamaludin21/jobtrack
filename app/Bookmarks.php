<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    protected $fillable = [
      'idUser', 'ticket', 'idPerusahaan', 'idVacancies', 'title', 'gajimin', 'gajimax', 'description'
    ];
}
