<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Perusahaan;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if(Auth::user()->level == 1)
      {
        return view('home');
      } else {
        $idUser = Auth::user()->id;
        $company = Perusahaan::where('idProfil', $idUser)->first();
        return view('recruiter.index', ['company' => $company]);
      }
    }
}
