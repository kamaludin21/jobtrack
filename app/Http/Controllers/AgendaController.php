<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    public function store(Request $request)
    {
      // 'ticket', 'idPerusahaan', 'title', 'status', 'tanggal', 'mulai', 'sampai', 'deskripsi'
      $agenda = Agenda::firstOrCreate([
        'ticket' => $request->ticket,
        'idPerusahaan' => $request->idPerusahaan,
        'title' => $request->title,
        'status' => $request->status,
        'tanggal' => $request->tanggal,
        'mulai' => $request->mulai,
        'sampai' => $request->sampai,
        'deskripsi' => $request->deskripsi
      ]);

      if ($agenda->wasRecentlyCreated) {
          return redirect('recruiter/vacancy/manage/'.$request->idPage.'')->with('success', 'Agenda berhasil ditambah');
      } else {
          return redirect('recruiter/vacancy/manage/'.$request->idPage.'')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
      }
    }
}
