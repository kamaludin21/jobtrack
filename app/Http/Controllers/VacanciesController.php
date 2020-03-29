<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Vacancy;
use Auth;

class VacanciesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lowongan()
    {
      $lowongan = Vacancy::all();
      return view('vacancies.index', ['lowongan' => $lowongan]);
    }

    public function store(Request $request)
    {
      // id perusahaan
      $ticket = Str::random(15);
      $idPerusahaan = Auth::user()->id;
      $status = 'active';

      $vacancy = Vacancy::create([
        'ticket' => $ticket,
        'idPerusahaan' => $idPerusahaan,
        'title' => $request->title,
        'bidang' => $request->bidang,
        'subbidang' => $request->subbidang,
        'gajimin' => $request->gajimin,
        'gajimax' => $request->gajimax,
        'type' => $request->type,
        'daerah' => $request->daerah,
        'expired' => $request->expired,
        'slot' => $request->slot,
        'description' => $request->description,
        'status' => $status
        ]);


      if($vacancy->wasRecentlyCreated) {
        return redirect('recruiter/vacancy')->with('success', 'Lowongan berhasil ditambah');
      } else {
        return redirect('recruiter/vacancy')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
      }
    }
}
