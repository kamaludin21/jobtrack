<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatesController extends Controller
{
    public function index()
    {

      $candidates = DB::table('users')
      ->join('profils', 'users.id', '=', 'profils.idUser')
      ->join('educations', 'users.id', '=', 'educations.idUser')
      ->join('skills', 'users.id', '=', 'skills.idUser')
      ->select(DB::raw("
        users.id as IdUser,
        users.name,
        profils.*,
        group_concat(DISTINCT educations.instansi, ' | ', educations.pendidikan  SEPARATOR', ') as pendidikan,
        group_concat(DISTINCT skills.skill) as skill"))
      ->where('users.level', '1')
      ->groupBy('users.id', 'profils.id',)
      ->get();
      return view('recruiter.candidate', ['candidates' => $candidates]);

    }
}
