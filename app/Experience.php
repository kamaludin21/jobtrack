<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
      'idUser', 'title', 'intansi', 'dari', 'sampai', 'daerah', 'industri', 'spesialisasi', 'bidang', 'jabatan', 'gaji'
    ];
}
