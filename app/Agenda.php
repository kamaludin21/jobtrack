<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
      'ticket', 'idPerusahaan', 'title', 'status', 'tanggal', 'mulai', 'sampai', 'deskripsi'
    ];
}
