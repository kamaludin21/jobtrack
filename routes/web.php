<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Recruiter
Route::prefix('recruiter')->group(function () {
    Route::get('', 'RecruitersController@index');
    Route::get('vacancy', 'RecruitersController@vacancy');
    Route::get('vacancy/form', 'RecruitersController@create');
    Route::get('candidate', 'RecruitersController@candidate');
});

// Vacancy
Route::post('vacancy/store', 'VacanciesController@store');


Route::get('lowongan', function() {
  return view('pages.lowongan');
});

Route::get('lowongan-detail', function() {
  return view('pages.detail');
});

Route::get('lowongan/employer', function() {
  return view('pages.employer');
});

Route::get('lowongan/apply', function() {
  return view('pages.apply');
});

Route::get('lowongan/success-apply', function() {
  return view('pages.success-apply');
});

Route::get('login', function() {
  return view('auth.login');
});

Route::get('user/dashboard', function() {
  return view('users.dashboard');
});

Route::get('user/profil', function() {
  return view('users.profil');
});

Route::get('user/lamaran', function() {
  return view('users.lamaran');
});

Route::get('user/bookmark', function() {
  return view('users.bookmark');
});

Route::get('user/invite', function() {
  return view('users.inviter');
});

// Mode Perusahaan

Route::get('employer/home', function () {
  return view('employer.home');
});

Route::get('employer/profil', function () {
  return view('employer.profil');
});

Route::get('employer/lowongan', function () {
  return view('employer.lowongan');
});

Route::get('employer/candidate', function () {
  return view('employer.candidate');
});

Route::get('employer/form', function () {
  return view('employer.form');
});

Auth::routes();
