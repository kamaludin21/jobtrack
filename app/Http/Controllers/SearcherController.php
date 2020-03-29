<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profil;

class SearcherController extends Controller
{
    public function index()
    {
      return view('users.dashboard');
    }

    public function editprofil()
    {
      $idUser = Auth::user()->id;
      $profil = Profil::where('idUser', $idUser)->first();
      return view('users.form-profil', ['profil' => $profil]);
    }

    public function StoreProfil(Request $request)
    {
      $idProfil = Auth::user()->id;
      $tempat = $request->tempat;
      $tgl = $request->tgl;
      $ttl = $tempat.', '.$tgl;


      $profil = Profil::create([
        'idUser' => $idProfil,
        'description' => $request->description,
        'Ttl' => $ttl,
        'alamat' => $request->alamat,
        'Agama' => $request->Agama,
        'kelamin' => $request->kelamin,
        'email' => $request->email,
        'telp' => $request->telp,
        'social1' => $request->social1,
        'social2' => $request->social2
      ]);

      if($profil->wasRecentlyCreated) {
        return redirect('user/profil')->with('success', 'data berhasil ditambah');
      } else {
        return redirect('user/profil')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
      }
    }

    public function profil()
    {
      $idUser = Auth::user()->id;
      $profil = Profil::where('idUser', $idUser)->first();
      return view('users.profil', ['profil' => $profil]);
    }
}
