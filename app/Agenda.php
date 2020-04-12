<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
      'ticket', 'idPerusahaan', 'namaperusahaan', 'namalowongan', 'title', 'status', 'tanggal', 'mulai', 'sampai', 'deskripsi'
    ];
}
