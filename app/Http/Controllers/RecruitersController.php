<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\Vacancy;
use Auth;
use Image;

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
        $company = Perusahaan::where('idUser', $idUser)->first();
      	return view('recruiter.index', ['company' => $company]);
    }

    public function profil()
    {
        $idUser = Auth::user()->id;
        $company = Perusahaan::where('idUser', $idUser)->first();
        return view('recruiter.form-profil', ['company' => $company]);
    }

    public function vacancy()
    {
      $idPerusahaan = Auth::user()->id;
      $vacancy = Vacancy::where('idPerusahaan', $idPerusahaan)->paginate(3);
      return view('recruiter.vacancy', ['vacancies' => $vacancy]);
    }

    public function StoreProfil(Request $request)
    {
        $idUser = Auth::user()->id;
        $status = 'verify';
        $website = 'https://'.''.$request->website;

        // Poto profil
        if ($request->hasfile('profil')) {
            $profil = $request->file('profil');
            $extension_profil = $profil->getClientOriginalExtension();
            $filename_profil = rand().'.'.$extension_profil;
            $profils = Image::make($profil->getRealPath())
                ->resize(160, 90)
                ->save('img/recruiter/profil/' . $filename_profil);
            $profil = $filename_profil;
        } else {
            $profil = 'company.png';
        }

        // Poto sampul
        if ($request->hasfile('sampul')) {
            $sampul = $request->file('sampul');
            $extension_sampul = $sampul->getClientOriginalExtension();
            $filename_sampul = rand().'.'.$extension_sampul;
            // $sampul->move('img/recruiter/sampul', $filename_sampul);
            $sampuls = Image::make($sampul->getRealPath())
                ->resize(160, 90)
                ->save('img/recruiter/sampul/' . $filename_sampul);
            $sampul = $filename_sampul;
        } else {
            $sampul = 'office.jpg';
        }

        $company = Perusahaan::create([
          'idUser' => $idUser,
          'name' => $request->name,
          'status' => $status,
          'alamat' => $request->alamat,
          'website' => $website,
          'profil' => $profil,
          'sampul' => $sampul,
          'description' => $request->description,
          'bidang' => $request->bidang
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
