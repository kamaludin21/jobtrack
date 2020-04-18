<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Image;
use App\{Perusahaan, Vacancy, Lamaran, Profil, Experience, Certificate, Educations, Skill, User, Agenda, Daerah};


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

    public function home()
    {
      return view('recruiter.home');
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
        $vacancy = Vacancy::where([
                      ['idPerusahaan', '=', $idPerusahaan],
                      ['status', '=', 'active']
                    ])
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);
        $vacancyClosed = Vacancy::where([
                      ['idPerusahaan', '=', $idPerusahaan],
                      ['status', '=', 'closed']
                    ])
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);
        return view('recruiter.vacancy', ['vacancies' => $vacancy, 'vacancyClosed' => $vacancyClosed]);
    }

    public function create()
    {
      $daerah = Daerah::all();
      return view('recruiter.form', ['daerah' => $daerah]);
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

        if($request->status == 4) {
          $lowongan = Vacancy::where('ticket', '=', $lamaran->ticket)->first();
          $lamaran = Lamaran::where([
            ['status', '=', '4'],
            ['ticket', '=', $lamaran->ticket],
            ])->count();
          if($lamaran < $lowongan->slot ) {
            $lamaran = Lamaran::findOrFail($id);
            $lamaran->status = $request->status;
            $lamaran->save();
            $pageId = $request->pageId;
            return redirect('recruiter/vacancy/manage/'.$pageId)->with('success', 'Data berhasil diubah');
          } else {
            $pageId = $request->pageId;
            return redirect('recruiter/vacancy/manage/'.$pageId)->with('danger', 'Slot lowongan sudah penuh');
          }

        } else {
          $lamaran = Lamaran::findOrFail($id);
          $lamaran->status = $request->status;
          $lamaran->save();
          $pageId = $request->pageId;
          return redirect('recruiter/vacancy/manage/'.$pageId)->with('success', 'Data berhasil diubah');
        }
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

    public function account()
    {
      $idUser = Auth::user()->id;
      $company = Perusahaan::where('idUser', $idUser)->first();
      $user = User::findOrFail($idUser);
      return view('recruiter.security', ['company' => $company, 'user' => $user]);
    }

    public function umum(Request $request, $id)
    {

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();
      return redirect('recruiter/account')->with('success', 'data berhasil diubah');
    }

    public function password(Request $request)
    {
        $request->validate([
          'current_password' => ['required', new MatchOldPassword],
          'new_password' => ['required'],
          'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect('recruiter/account')->with('success', 'Password diubah');
    }


}
