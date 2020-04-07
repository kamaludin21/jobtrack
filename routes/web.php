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
    Route::get('vacancy/manage/{id}', 'RecruitersController@manage');
    Route::get('candidate', 'RecruitersController@candidate');
    Route::get('edit/profil', 'RecruitersController@profil');
    Route::post('profil/store', 'RecruitersController@StoreProfil');
    Route::get('applicants/{id}', 'RecruitersController@ProfilApplicants');
    Route::match(['put', 'patch'], '/updatestatus/{idLamar}', 'RecruitersController@UpdateStatus');
    Route::get('/inviter/{id}', 'RecruitersController@invite');
    Route::post('/inviter/store', 'InvitersController@store');
    Route::post('/agenda/store', 'AgendaController@store');
});

Route::prefix('candidate')->group(function () {
    Route::get('', 'CandidatesController@index');
});

Route::prefix('lowongan')->group(function (){
  Route::get('/', 'VacanciesController@lowongan');
  Route::get('/detail/{ticket}', 'VacanciesController@detail');
  Route::get('/detail/apply/{ticket}', 'VacanciesController@apply');
  Route::post('/apply', 'VacanciesController@StoreApply');
  Route::post('/search', 'VacanciesController@search');
  Route::get('/apply/success', function(){
    return view('vacancies.success');
  });
});

// Vacancy
Route::post('vacancy/store', 'VacanciesController@store');

/*
/ User Section
*/
Route::prefix('user')->group(function () {
  Route::get('dashboard', 'SearcherController@index');
  Route::get('profil', 'SearcherController@profil');
  Route::get('profil/form', 'SearcherController@editprofil');
  Route::post('profil/store', 'SearcherController@StoreProfil');
  Route::get('pengalaman/form', 'SearcherController@EditPengalaman');
  Route::post('pengalaman/store', 'SearcherController@StorePengalaman');
  Route::get('sertifikat/form', 'SearcherController@EditSertifikat');
  Route::post('sertifikat/store', 'SearcherController@StoreSertifikat');
  Route::get('pendidikan/form', 'SearcherController@EditPendidikan');
  Route::post('pendidikan/store', 'SearcherController@StorePendidikan');
  Route::get('skill/form', 'SearcherController@EditSkill');
  Route::post('skill/store', 'SearcherController@StoreSkill');
  Route::get('/lamaran', 'SearcherController@lamaran');
  Route::get('/bookmark', 'BookmarksController@index');
  Route::post('/bookmark/store', 'BookmarksController@store');
  Route::get('/invite', 'SearcherController@inviter');
  Route::get('/invite/{id}', 'SearcherController@ShowInviter');
});

// Useless route- remove after
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


Auth::routes();
