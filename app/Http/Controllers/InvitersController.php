<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\Inviter;
use Auth;

class InvitersController extends Controller
{
    public function store(Request $request)
    {
      $perusahaan = Perusahaan::where('idUser', Auth::user()->id)->first();
      $invite = Inviter::create([
        'idPerusahaan' => $perusahaan->id,
        'idUser' => $request->idUser,
        'perusahaan' => $perusahaan->name,
        'name' => $request->name,
        'subjek' => $request->subjek,
        'message' => $request->message
      ]);

      if ($invite->wasRecentlyCreated) {
          return redirect('recruiter/')->with('success', 'Data berhasil ditambah');
      } else {
          return redirect('recruiter/')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
      }
    }
}
