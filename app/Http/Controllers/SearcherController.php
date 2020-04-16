<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\{Profil, Experience, Certificate, Educations, Skill, Lamaran, Inviter, Agenda, User};

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
        // For counting
        $lamar = Lamaran::where('idUser', $idUser)->count();
        $certificate = Certificate::where('idUser', $idUser)->count();
        $experience = Experience::where('idUser', $idUser)->count();
        $agendaCount = DB::table('lamarans')
            ->join('vacancies', 'lamarans.ticket', '=', 'vacancies.ticket')
            ->where([
              ['lamarans.idUser', '=', $idUser],
              ['lamarans.status', '=', '3'],
            ])->count();

        $lamaran = DB::table('lamarans')
            ->join('vacancies', 'lamarans.ticket', '=', 'vacancies.ticket')
            ->join('perusahaans', 'lamarans.idPerusahaan', '=', 'perusahaans.id')
            ->where([
              ['lamarans.idUser', '=', $idUser],
            ])
            ->whereIn('lamarans.status', [2, 3])
            ->select('lamarans.ticket', 'lamarans.status', 'vacancies.title', 'perusahaans.name')
            ->get();

        $agenda = Agenda::all();

        return view('users.dashboard', [
          'profil' => $profil,
          'lamaran' => $lamaran,
          'agenda' => $agenda,
          'lamar' => $lamar,
          'certificate' => $certificate,
          'experience' => $experience,
          'agendaCount' => $agendaCount
        ]);
    }

    public function indexSingle($ticket)
    {
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        // For counting
        $lamar = Lamaran::where('idUser', $idUser)->count();
        $certificate = Certificate::where('idUser', $idUser)->count();
        $experience = Experience::where('idUser', $idUser)->count();
        $agendaCount = DB::table('lamarans')
            ->join('vacancies', 'lamarans.ticket', '=', 'vacancies.ticket')
            ->where([
              ['lamarans.idUser', '=', $idUser],
              ['lamarans.status', '=', '3'],
            ])->count();


        $lamaran = DB::table('lamarans')
            ->join('vacancies', 'lamarans.ticket', '=', 'vacancies.ticket')
            ->join('perusahaans', 'lamarans.idPerusahaan', '=', 'perusahaans.id')
            ->where([
              ['lamarans.idUser', '=', $idUser],
            ])
            ->whereIn('lamarans.status', [2, 3])
            ->select('lamarans.ticket', 'lamarans.status', 'vacancies.title', 'perusahaans.name')
            ->get();

        $agenda = Agenda::where('ticket', $ticket)->get();
        $sendTicket = $ticket;

        return view('users.dashboard-single', [
          'profil' => $profil,
          'lamaran' => $lamaran,
          'agenda' => $agenda,
          'lamar' => $lamar,
          'certificate' => $certificate,
          'experience' => $experience,
          'agendaCount' => $agendaCount,
          'ticket' => $sendTicket
        ]);
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

    public function UpdateFoto(Request $request, $id)
    {
      $profiles = Profil::findOrFail($id);

      // if ($request->hasfile('profil')) {
      //     $profil = $request->file('profil');
      //     $extension_profil = $profil->getClientOriginalExtension();
      //     $filename_profil = rand().'.'.$extension_profil;
      //     $profil->move('img/profil', $filename_profil);
      //     $profil = $filename_profil;
      // }

      $profil = $request->file('profil');
      $extension_profil = $profil->getClientOriginalExtension();
      $filename_profil = rand().'.'.$extension_profil;
      $profils = Image::make($profil->getRealPath())
          ->resize(216, 216)
          ->save('img/profil/' . $filename_profil);

      $profiles->profil = $filename_profil;
      $profiles->save();




      return redirect('user/profil')->with('success', 'data berhasil diubah');
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

    public function UpdateProfil(Request $request, $id)
    {
        $idProfil = Auth::user()->id;
        $tempat = $request->tempat;
        $tgl = $request->tgl;
        $ttl = $tempat.', '.$tgl;


        $profil = Profil::findOrFail($id);
        $profil->description = $request->description;
        $profil->ttl = $ttl;
        $profil->alamat = $request->alamat;
        $profil->agama = $request->agama;
        $profil->kelamin = $request->kelamin;
        $profil->email = $request->email;
        $profil->telp = $request->telp;
        $profil->social1 = $request->social1;
        $profil->social2 = $request->social2;
        $profil->status = $request->status;
        $profil->gaji = $request->gaji;
        $profil->save();

        return redirect('user/profil')->with('success', 'data berhasil diubah');
    }

    public function EditPengalaman()
    {
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        return view('users.form-pengalaman', ['profil' => $profil]);
    }

    public function UpdatePengalaman($id)
    {
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        $pengalaman = Experience::findOrFail($id);
        return view('users.form-pengalaman-edit', ['profil' => $profil, 'pengalaman' => $pengalaman]);
    }

    public function UpdatePengalamanData(Request $request, $id)
    {
        $tanggal = explode("-", $request->dari);



        $pengalaman = Experience::findOrFail($id);
        $pengalaman->title = $request->title;
        $pengalaman->intansi= $request->instansi;
        $pengalaman->dari = $tanggal[0];
        $pengalaman->sampai = $tanggal[1];
        $pengalaman->daerah = $request->daerah;
        $pengalaman->industri = $request->industri;
        $pengalaman->spesialisasi = $request->spesialisasi;
        $pengalaman->bidang = $request->bidang;
        $pengalaman->jabatan = $request->jabatan;
        $pengalaman->gaji = $request->gaji;

        $pengalaman->save();

        return redirect('user/profil')->with('success', 'data berhasil diubah');
    }

    public function DestroyPengalaman($id)
    {
        $pengalaman = Experience::findOrFail($id);
        $pengalaman->delete();
        return redirect('user/profil')->with('delete', 'Data berhasil dihapus');
    }


    public function StorePengalaman(Request $request)
    {
        $idUser = Auth::user()->id;

        $tanggal= explode("-", $request->dari);

        $experience = Experience::create([
        'idUser' => $idUser,
        'title' => $request->title,
        'intansi' => $request->instansi,
        'dari' => $tanggal[0],
        'sampai' => $tanggal[1],
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
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        return view('users.form-certificate', ['profil' => $profil]);
    }

    public function UpdateSertifikat($id)
    {
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        $sertifikat = Certificate::findOrFail($id);
        return view('users.form-certificate-edit', ['profil' => $profil, 'sertifikat' => $sertifikat]);
    }

    public function UpdateSertifikatData(Request $request, $id)
    {
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();

        $sertifikat = Certificate::findOrFail($id);

        $tanggal= explode("-", $request->dari);

        $sertifikat->idUser = Auth::user()->id;
        $sertifikat->title = $request->title;
        $sertifikat->instansi = $request->instansi;
        $sertifikat->description = $request->description;
        $sertifikat->dari = $tanggal[0];
        $sertifikat->sampai = $tanggal[1];

        if ($request->hasfile('image1')) {
            $image1 = $request->file('image1');
            $extension_image1 = $image1->getClientOriginalExtension();
            $filename_image1 = rand().'.'.$extension_image1;
            $image1->move('sertifikat', $filename_image1);
            $sertifikat->image1 = $filename_image1;
        }

        if ($request->hasfile('image2')) {
            $image2 = $request->file('image2');
            $extension_image2 = $image2->getClientOriginalExtension();
            $filename_image2 = rand().'.'.$extension_image2;
            $image2->move('sertifikat', $filename_image2);
            $sertifikat->image2 = $filename_image2;
        }

        $sertifikat->save();
        return redirect('user/profil')->with('success', 'Data berhasil ditambah');
    }

    public function StoreSertifikat(Request $request)
    {
        $sertifikat = new Certificate();
        $tanggal= explode("-", $request->dari);

        $sertifikat->idUser = Auth::user()->id;
        $sertifikat->title = $request->title;
        $sertifikat->instansi = $request->instansi;
        $sertifikat->description = $request->description;
        $sertifikat->dari = $tanggal[0];
        $sertifikat->sampai = $tanggal[1];

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
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        return view('users.form-pendidikan', ['profil' => $profil]);
    }

    public function UpdatePendidikan($id)
    {
        $pendidikan = Educations::findOrFail($id);
        return view('users.form-pendidikan-edit', ['pendidikan' => $pendidikan]);
    }

    public function UpdatePendidikanData(Request $request, $id)
    {
        $pendidikan = Educations::findOrFail($id);
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->instansi = $request->instansi;
        $pendidikan->angkatan = $request->angkatan;
        $pendidikan->save();

        return redirect('user/profil')->with('success', 'Data pendidikan berhasil diubah');
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

    public function DestroyPendidikan($id)
    {
        $pendidikan = Educations::findOrFail($id);
        $pendidikan->delete();
        return redirect('user/profil')->with('delete', 'Data berhasil dihapus');
    }

    public function EditSkill()
    {
        $idUser = Auth::user()->id;
        $profil = Profil::where('idUser', $idUser)->first();
        return view('users.form-skill', ['profil' => $profil]);
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

    public function DestroySkill($id)
    {
      $skill = Skill::findOrFail($id);
      $skill->delete();
      return redirect('user/profil')->with('success', 'data berhasil dihapus');
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

    public function security()
    {
      $idUser = Auth::user()->id;
      $profil = Profil::where('idUser', $idUser)->first();
      $user = User::findOrFail($idUser);
      return view('account.security', ['profil' => $profil, 'user' => $user]);
    }
}
