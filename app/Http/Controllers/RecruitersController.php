<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        
      	return view('recruiter.index');
    }

    public function vacancy()
    {
      $idPerusahaan = Auth::user()->id;
      $vacancy = Vacancy::where('idPerusahaan', $idPerusahaan)->get();
      return view('recruiter.vacancy', ['vacancies' => $vacancy]);
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
