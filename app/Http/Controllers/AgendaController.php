<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\{Agenda, Perusahaan, Vacancy};

class AgendaController extends Controller
{
    public function store(Request $request)
    {
      $perusahaan = Perusahaan::where('id', $request->idPerusahaan)->first();
      $agenda = Agenda::firstOrCreate([
        'ticket' => $request->ticket,
        'idPerusahaan' => $request->idPerusahaan,
        'namaperusahaan' => $perusahaan->name,
        'namalowongan' => $request->namalowongan,
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

    public function detail($id)
    {
      // Data yang ditampilkan
      // agenda, lamaran, pelamar
      // $pelamar = Lamaran::where('ticket', '=', $ticket)->get();
      $agendaFirst = Agenda::findOrFail($id);
      $ticket = $agendaFirst->ticket;
      $pelamar = DB::table('lamarans')
          ->join('users', 'lamarans.idUser', '=', 'users.id')
          ->join('educations', 'lamarans.idUser', '=', 'educations.idUser')
          ->join('skills', 'lamarans.idUser', '=', 'skills.idUser')
          ->select(DB::raw("
            users.id, users.name, users.email,
            lamarans.id as idLamar, lamarans.ticket, lamarans.status,
            group_concat(DISTINCT educations.instansi, ' | ', educations.pendidikan  SEPARATOR', ') as pendidikan,
            group_concat(DISTINCT skills.skill) as skill"))
          ->where('lamarans.ticket', $ticket)
          ->groupBy('users.id', 'lamarans.id')
          ->get();

      $lowongan = Vacancy::where('ticket', '=', $ticket)->first();

      // For navigator
      $agendas = Agenda::where('ticket', '=', $ticket)->get();
  

      // $agenda = Agenda::where('ticket', '=', $ticket)->first();

      return view('recruiter.agenda-detail', ['pelamar' => $pelamar, 'lowongan' => $lowongan, 'agenda' => $agendas, 'agendaFirst' => $agendaFirst]);
    }
}
