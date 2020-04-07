<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Profil;
use App\Experience;
use App\Certificate;
use App\Educations;
use App\Skill;
use App\Lamaran;
use App\Inviter;
use App\Agenda;

class SearcherController extends Controller
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
        $profil = Profil::where('idUser', $idUser)->first();


        $posts = DB::select('SELECT lamarans.idUser, lamarans.status as statusLamar, lamarans.idPerusahaan, agendas.status as statusAgenda, agendas.title
            FROM lamarans
            INNER JOIN agendas ON lamarans.ticket=agendas.ticket
            WHERE lamarans.status=agendas.status AND lamarans.idUser = '.$idUser.'');

        // return $posts;

        return view('users.dashboard', ['profil' => $profil]);
    }

    public function profil()
    {
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        $pengalaman = Experience::where('idUser', $idUser)->get();
        $certificate = Certificate::where('idUser', $idUser)->get();
        $pendidikan = Educations::where('idUser', $idUser)->get();
        $skill = Skill::where('idUser', $idUser)->get();
        return view('users.profil', [
        'profil' => $profil,
        'pengalaman' => $pengalaman,
        'certificate' => $certificate,
        'pendidikan' => $pendidikan,
        'skill' => $skill
      ]);
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

        if ($request->hasfile('profil')) {
            $profil = $request->file('profil');
            $extension_profil = $profil->getClientOriginalExtension();
            $filename_profil = rand().'.'.$extension_profil;
            $profil->move('img/profil', $filename_profil);
            $profil = $filename_profil;
        } else {
            $profil = 'default.jpg';
        }

        $profil = Profil::create([
        'idUser' => $idProfil,
        'description' => $request->description,
        'ttl' => $ttl,
        'alamat' => $request->alamat,
        'agama' => $request->agama,
        'kelamin' => $request->kelamin,
        'email' => $request->email,
        'telp' => $request->telp,
        'social1' => $request->social1,
        'social2' => $request->social2,
        'status' => $request->status,
        'profil' => $profil,
        'gaji' => $request->gaji
      ]);

        if ($profil->wasRecentlyCreated) {
            return redirect('user/profil')->with('success', 'data berhasil ditambah');
        } else {
            return redirect('user/profil')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
        }
    }

    public function EditPengalaman()
    {
        $idUser = Auth::user()->id;
        $pengalaman = Experience::where('idUser', $idUser)->first();
        return view('users.form-pengalaman', ['pengalaman' => $pengalaman]);
    }

    public function StorePengalaman(Request $request)
    {
        $idUser = Auth::user()->id;

        $experience = Experience::create([
        'idUser' => $idUser,
        'title' => $request->title,
        'intansi' => $request->instansi,
        'dari' => $request->dari,
        'sampai' => $request->sampai,
        'daerah' => $request->daerah,
        'industri' => $request->industri,
        'spesialisasi' => $request->spesialisasi,
        'bidang' => $request->bidang,
        'jabatan' => $request->jabatan,
        'gaji' => $request->gaji
      ]);

        if ($experience->wasRecentlyCreated) {
            return redirect('user/profil')->with('success', 'data berhasil ditambah');
        } else {
            return redirect('user/profil')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
        }
    }

    public function EditSertifikat()
    {
        return view('users.form-certificate');
    }

    public function StoreSertifikat(Request $request)
    {
        $sertifikat = new Certificate();

        $sertifikat->idUser = Auth::user()->id;
        $sertifikat->title = $request->title;
        $sertifikat->instansi = $request->instansi;
        $sertifikat->description = $request->description;
        $sertifikat->dari = $request->dari;
        $sertifikat->sampai = $request->sampai;

        if ($request->hasfile('image1')) {
            $image1 = $request->file('image1');
            $extension_image1 = $image1->getClientOriginalExtension();
            $filename_image1 = rand().'.'.$extension_image1;
            $image1->move('sertifikat', $filename_image1);
            $sertifikat->image1 = $filename_image1;
        } else {
            $sertifikat->image1 = 'default.png';
        }

        if ($request->hasfile('image2')) {
            $image2 = $request->file('image2');
            $extension_image2 = $image2->getClientOriginalExtension();
            $filename_image2 = rand().'.'.$extension_image2;
            $image2->move('sertifikat', $filename_image2);
            $sertifikat->image2 = $filename_image2;
        } else {
            $sertifikat->image2 = 'default.png';
        }

        $sertifikat->save();
        return redirect('user/profil')->with('success', 'Data berhasil ditambah');
    }

    public function EditPendidikan()
    {
        return view('users.form-pendidikan');
    }

    public function StorePendidikan(Request $request)
    {
        $idUser = Auth::user()->id;
        $pendidikan = Educations::create([
        'idUser' => $idUser,
        'pendidikan' => $request->pendidikan,
        'instansi' => $request->instansi,
        'angkatan' => $request->angkatan
      ]);

        if ($pendidikan->wasRecentlyCreated) {
            return redirect('user/profil')->with('success', 'data berhasil ditambah');
        } else {
            return redirect('user/profil')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
        }
    }

    public function EditSkill()
    {
        return view('users.form-skill');
    }

    public function StoreSkill(Request $request)
    {
        $idUser = Auth::user()->id;
        $skill = Skill::create([
        'idUser' => $idUser,
        'skill' => $request->skill,
        'level' => $request->level
      ]);

        if ($skill->wasRecentlyCreated) {
            return redirect('user/profil')->with('success', 'data berhasil ditambah');
        } else {
            return redirect('user/profil')->with('warning', 'Upps, Tampaknya ada yang salah, ulangi sekali lagi');
        }
    }

    public function lamaran()
    {
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        $lamaran = DB::table('lamarans')
            ->join('vacancies', 'lamarans.ticket', '=', 'vacancies.ticket')
            ->join('perusahaans', 'lamarans.idPerusahaan', '=', 'perusahaans.id')
            ->select(
                'lamarans.ticket',
                'lamarans.status',
                'vacancies.title',
                'vacancies.daerah',
                'vacancies.gajimin',
                'vacancies.gajimax',
                'perusahaans.name'
            )
            ->where('lamarans.idUser', '=', Auth::user()->id)
            ->get();
        return view('users.lamaran', ['profil' => $profil, 'lamaran' => $lamaran]);
    }

    public function inviter()
    {
        $idUser = Auth::user()->id;
        $inviter = Inviter::where('idUser', Auth::user()->id)->get();
        $profil = Profil::where('idUser', $idUser)->first();
        return view('users.inviter', ['inviter' => $inviter, 'profil' => $profil]);
    }

    public function ShowInviter($id)
    {
        $idUser = Auth::user()->id;
        $inviter = Inviter::find($id);
        $profil = Profil::where('idUser', $idUser)->first();
        return view('users..inviter-detail', ['inviter' => $inviter, 'profil' => $profil]);
    }
}
