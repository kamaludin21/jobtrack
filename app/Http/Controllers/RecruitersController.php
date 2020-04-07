<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Perusahaan;
use App\Vacancy;
use App\Lamaran;
use App\Profil;
use App\Experience;
use App\Certificate;
use App\Educations;
use App\Skill;
use App\User;
use App\Agenda;
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
        $vacancy = Vacancy::where('idPerusahaan', $idPerusahaan)
      ->orderBy('created_at', 'desc')
      ->paginate(3);
        return view('recruiter.vacancy', ['vacancies' => $vacancy]);
    }

    public function create()
    {
      return view('recruiter.form');
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

        if ($company->wasRecentlyCreated) {
            return redirect('recruiter/')->with('success', 'Lowongan berhasil ditambah');
        } else {
            return redirect('recruiter/')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
        }
    }

    public function manage($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $agenda = Agenda::where('ticket', $vacancy->ticket)->get();

        $lamaran = DB::table('lamarans')
            ->join('users', 'lamarans.idUser', '=', 'users.id')
            ->join('educations', 'lamarans.idUser', '=', 'educations.idUser')
            ->join('skills', 'lamarans.idUser', '=', 'skills.idUser')
            ->select(DB::raw("
              users.id, users.name, users.email,
              lamarans.id as idLamar, lamarans.ticket, lamarans.status,
              group_concat(DISTINCT educations.instansi, ' | ', educations.pendidikan  SEPARATOR', ') as pendidikan,
              group_concat(DISTINCT skills.skill) as skill"))
            ->where('lamarans.ticket', $vacancy->ticket)
            ->groupBy('users.id', 'lamarans.id')
            ->get();

        return view('recruiter.manage-vacancies', ['vacancy' => $vacancy, 'lamaran' => $lamaran, 'agenda' => $agenda]);
    }

    public function UpdateStatus(Request $request, $idLamar)
    {
        $id = $idLamar;
        $lamaran = Lamaran::findOrFail($id);

        $lamaran->status = $request->status;
        $lamaran->save();

        $pageId = $request->pageId;
        return redirect('recruiter/vacancy/manage/'.$pageId)->with('success', 'Data berhasil diubah');
    }

    public function ProfilApplicants($id)
    {
        $idUser =  $id;

        $user = User::where('id', $id)->first();
        $profil = Profil::where('idUser', $idUser)->first();
        $pengalaman = Experience::where('idUser', $idUser)->get();
        $certificate = Certificate::where('idUser', $idUser)->get();
        $pendidikan = Educations::where('idUser', $idUser)->get();
        $skill = Skill::where('idUser', $idUser)->get();

        return view('vacancies.profil', [
        'user' => $user,
        'profil' => $profil,
        'pengalaman' => $pengalaman,
        'certificate' => $certificate,
        'pendidikan' => $pendidikan,
        'skill' => $skill
      ]);
    }

    public function invite($id)
    {
      $candidate = User::findOrFail($id);
      return view('recruiter.form-invite', ['candidate' => $candidate]);
    }
}
