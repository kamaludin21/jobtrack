<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\Vacancy;
use Auth;

class RecruitersController extends Controller
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

    public function index()
    {
        // $flight = App\Flight::where('number', 'FR 900')->first();
        $idUser = Auth::user()->id;
        $company = Perusahaan::where('idProfil', $idUser)->first();
      	return view('recruiter.index', ['company' => $company]);
    }

    public function profil()
    {
        $idUser = Auth::user()->id;
        $company = Perusahaan::where('idProfil', $idUser)->first();
        return view('recruiter.form-profil', ['company' => $company]);
    }

    public function vacancy()
    {
      $idPerusahaan = Auth::user()->id;
      $vacancy = Vacancy::where('idPerusahaan', $idPerusahaan)->get();
      return view('recruiter.vacancy', ['vacancies' => $vacancy]);
    }

    public function StoreProfil(Request $request)
    {
        $idProfil = Auth::user()->id;
        // $status = 'verifyd/unverify';
        $status = 'verify';
        $company = Perusahaan::create([
          'idProfil' => $idProfil,
          'name' => $request->name,
          'status' => $status,
          'alamat' => $request->alamat,
          'website' => $request->website,
          'profil' => $request->profil,
          'sampul' => $request->sampul,
          'description' => $request->description
        ]);

        if($company->wasRecentlyCreated) {
          return redirect('recruiter/')->with('success', 'Lowongan berhasil ditambah');
        } else {
          return redirect('recruiter/')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
        }
    }

    public function manage($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('recruiter.manage-vacancies', ['vacancy' => $vacancy]);
    }

    public function candidate()
    {
    	return view('recruiter.candidate');
    }

    public function create()
    {
    	return view('recruiter.form');
    }
}
