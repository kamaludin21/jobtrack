<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\{Vacancy, Lamaran, Perusahaan, Daerah, Educations, Keilmuan};
use Auth;

class VacanciesController extends Controller
{

    public function lowongan()
    {
        $lowongan = DB::table('vacancies')
        ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
        ->join('daerahs', 'vacancies.daerah', '=', 'daerahs.id')
        ->join('keilmuans', 'vacancies.keilmuan', '=', 'keilmuans.id')
        ->select('perusahaans.name', 'perusahaans.profil', 'vacancies.*', 'daerahs.*', 'keilmuans.title as bidang')
        ->where('vacancies.status', 'active')
        ->orderByRaw('vacancies.created_at DESC')
        ->paginate(3);
        $daerah = Daerah::all();
        $keilmuan = Keilmuan::all();
        return view('vacancies.index', ['lowongans' => $lowongan, 'daerah' => $daerah, 'keilmuan' => $keilmuan]);
    }

    public function search(Request $request)
    {

      $lowongan = DB::table('vacancies')
      ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
      ->join('daerahs', 'vacancies.daerah', '=', 'daerahs.id')
      ->join('keilmuans', 'vacancies.keilmuan', '=', 'keilmuans.id')
      ->where([
        ['vacancies.status', '=', 'active'],
        ['vacancies.title', 'like', '%'.$request->title.'%'],
        ['vacancies.bidang', 'like', '%'.$request->bidang.'%'],
        ['vacancies.keilmuan', 'like', '%'.$request->keilmuan.'%'],
        ['vacancies.subkeilmuan', 'like', '%'.$request->subkeilmuan.'%'],
        ['daerahs.daerah', 'like', '%'.$request->daerah.'%'],
        ['vacancies.type', 'like', '%'.$request->type.'%']
      ])
      ->orderBy('vacancies.created_at', 'desc')
      ->get();
      $daerah = Daerah::all();
      $keilmuan = Keilmuan::all();
        return view('vacancies.result', ['lowongans' => $lowongan, 'daerah' => $daerah, 'keilmuan' => $keilmuan]);
    }

    public function detail($ticket)
    {
        $lowongan = DB::table('vacancies')
        ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
        ->join('daerahs', 'vacancies.daerah', '=', 'daerahs.id')
        ->join('keilmuans', 'vacancies.keilmuan', '=', 'keilmuans.id')
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
            'perusahaans.description as deskripsi',
            'daerahs.*',
            'keilmuans.title as keilmuan'
        )->first();


        if (Auth::check()) {
            $lamaran = DB::table('lamarans')->where([
                        ['idUser', '=', Auth::user()->id],
                        ['ticket', '=', $ticket]
                      ])->get();
        } else {
            $lamaran = [0];
        }

          // Untuk lowongan terkait
        $lowongans = DB::table('vacancies')
                    ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
                    ->join('daerahs', 'vacancies.daerah', '=', 'daerahs.id')
                    ->where([
                      ['vacancies.bidang', '=', $lowongan->bidang],
                      ['vacancies.ticket', '!=', $lowongan->ticket]
                    ])
                    ->select(
                        'vacancies.*',
                        'perusahaans.name',
                        'perusahaans.bidang as bidangperusahaan',
                        'perusahaans.status',
                        'perusahaans.alamat',
                        'perusahaans.website',
                        'perusahaans.profil',
                        'perusahaans.sampul',
                        'perusahaans.description as deskripsi',
                        'daerahs.*'
                    )->skip(0)->take(4)->get();

        return view('vacancies.detail', ['lowongan' => $lowongan, 'lamaran' => $lamaran, 'lowongans' => $lowongans]);
    }

    public function apply($ticket)
    {
        $lowongan = DB::table('vacancies')
          ->join('perusahaans', 'vacancies.idPerusahaan', '=', 'perusahaans.id')
          ->join('daerahs', 'vacancies.daerah', '=', 'daerahs.id')
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
              'perusahaans.description as deskripsi',
              'daerahs.daerah'
          )->first();

        if($lowongan->keilmuan !== 6)
        {
          $educations = Educations::where([
            ['idUser', '=', Auth::user()->id],
            ['keilmuan', '=', $lowongan->keilmuan]
          ])->get();
        }

        return view('vacancies.apply', ['lowongan' => $lowongan, 'educations' => $educations]);
    }

    public function StoreApply(Request $request)
    {
        $idUser = Auth::user()->id;
        $ticket = $request->ticket;
        $idPerusahaan = $request->idPerusahaan;
        $lamar = Lamaran::create([
          'ticket'       => $ticket,
          'idUser'       => $idUser,
          'status'       => '1',
          'idPerusahaan' => $idPerusahaan
        ]);

        if ($lamar->wasRecentlyCreated) {
            // Kasi notifikasi ke perusahaan ada lamaran baru yang masuk
            return redirect('lowongan/apply/success')->with('success', 'Lowongan berhasil ditambah');
        } else {
            return redirect('lowongan/detail/'.$ticket)->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
        }
    }

    public function store(Request $request)
    {
        $ticket = Str::random(15);
        $idPerusahaan = Auth::user()->id;
        $status = 'active';

        $vacancy = Vacancy::create([
        'ticket'       => $ticket,
        'idPerusahaan' => $idPerusahaan,
        'title'        => $request->title,
        'bidang'       => $request->bidang,
        'subbidang'    => $request->subbidang,
        'keilmuan'     => $request->keilmuan,
        'subkeilmuan'  => $request->subkeilmuan,
        'gaji'         => $request->gaji,
        'gajimin'      => $request->gajimin,
        'gajimax'      => $request->gajimax,
        'type'         => $request->type,
        'daerah'       => $request->daerah,
        'expired'      => $request->expired,
        'slot'         => $request->slot,
        'description'  => $request->description,
        'status'       => $status
        ]);


        if ($vacancy->wasRecentlyCreated) {
            return redirect('recruiter/vacancy')->with('success', 'Lowongan berhasil ditambah');
        } else {
            return redirect('recruiter/vacancy')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
        }
    }

    public function company($id)
    {
      $company = Perusahaan::findOrFail($id);
      $lowongan = Vacancy::where('idPerusahaan', $id)->orderByRaw('vacancies.created_at DESC')->get();
      return view('vacancies.company', ['company' => $company, 'lowongans' => $lowongan]);
    }

}
