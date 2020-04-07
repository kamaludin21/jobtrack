<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Vacancy;
use App\Lamaran;
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
      $lowongan = DB::table('vacancies')
      ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
      ->select('perusahaans.name', 'perusahaans.profil', 'vacancies.*')
      ->where('vacancies.status', 'active')
      ->orderBy('vacancies.created_at', 'desc')
      ->paginate(3);

      // return $lowongan;

      return view('vacancies.index', ['lowongans' => $lowongan]);
    }

    public function search(Request $request)
    {
      $lowongan = DB::table('vacancies')
      ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
      ->where([
        ['vacancies.status', '=', 'active'],
        ['vacancies.title', 'like', '%'.$request->title.'%'],
        ['vacancies.bidang', 'like', '%'.$request->bidang.'%'],
        ['vacancies.daerah', 'like', '%'.$request->daerah.'%'],
        ['vacancies.type', 'like', '%'.$request->type.'%']
      ])
      ->orderBy('vacancies.created_at', 'desc')
      ->get();
      return view('vacancies.result', ['lowongans' => $lowongan]);
    }

    public function detail($ticket)
    {
      $lowongan = DB::table('vacancies')
      ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
      ->where('vacancies.ticket', '=', $ticket)
      ->select(
        'vacancies.*',
        'perusahaans.name',
        'perusahaans.bidang as bidangperusahaan',
        'perusahaans.status',
        'perusahaans.alamat',
        'perusahaans.website',
        'perusahaans.profil',
        'perusahaans.sampul',
        'perusahaans.description as deskripsi')
      ->first();

      $lamaran = DB::table('lamarans')->where([
        ['idUser', '=', Auth::user()->id],
        ['ticket', '=', $ticket]
        ])->get();

      // dd($lowongan);
      return view('vacancies.detail', ['lowongan' => $lowongan, 'lamaran' => $lamaran]);
    }

    public function apply($ticket)
    {
      $lowongan = DB::table('vacancies')
      ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
      ->where('vacancies.ticket', '=', $ticket)
      ->select(
        'vacancies.*',
        'perusahaans.id as idPerusahaan',
        'perusahaans.name',
        'perusahaans.bidang as bidangperusahaan',
        'perusahaans.status',
        'perusahaans.alamat',
        'perusahaans.website',
        'perusahaans.profil',
        'perusahaans.sampul',
        'perusahaans.description as deskripsi')
      ->first();
      return view('vacancies.apply', ['lowongan' => $lowongan]);
    }

    public function StoreApply(Request $request)
    {
      $idUser = Auth::user()->id;
      $ticket = $request->ticket;
      $idPerusahaan = $request->idPerusahaan;
      $lamar = Lamaran::create([
        'ticket' => $ticket,
        'idUser' => $idUser,
        'status' => '1',
        'idPerusahaan' => $idPerusahaan
      ]);

      if($lamar->wasRecentlyCreated) {
        return redirect('lowongan/apply/success')->with('success', 'Lowongan berhasil ditambah');
      } else {
        return redirect('lowongan/detail/'.$ticket)->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
      }
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
