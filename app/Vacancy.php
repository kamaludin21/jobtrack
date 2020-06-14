<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = [
      'ticket',
      'idPerusahaan',
      'title',
      'bidang',
      'subbidang',
      'keilmuan',
      'subkeilmuan',
      'gaji',
      'gajimin',
      'gajimax',
      'type',
      'daerah',
      'expired',
      'slot',
      'description',
      'status'
    ];
}
