<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use App\Bookmarks;
use Auth;

class BookmarksController extends Controller
{
    public function index()
    {
      $idUser = Auth::user()->id;
      $profil = Profil::where('idUser', $idUser)->first();
      $bookmark = Bookmarks::where('idUser', $idUser)->get();
      return view('users.bookmark', ['profil' => $profil, 'bookmarks' => $bookmark]);
    }

    public function store(Request $request)
    {

      $idUser = Auth::user()->id;
      $bookmark = Bookmarks::create([
        'idUser' => $idUser,
        'ticket' => $request->ticket,
        'idPerusahaan' => $request->idPerusahaan,
        'idVacancies' => $request->idVacancies,
        'title' => $request->title,
        'gajimin' => $request->gajimin,
        'gajimax' => $request->gajimax,
        'description' => $request->description
      ]);

      if ($bookmark->wasRecentlyCreated) {
          return redirect('user/bookmark')->with('success', 'data berhasil ditambah');
      } else {
          return redirect('user/bookmark')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
      }

    }
}
