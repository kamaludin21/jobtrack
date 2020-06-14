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

Route::get('/', 'WelcomesController@welcome');
Route::get('/home', 'HomeController@index')->name('home');

// Recruiter
Route::prefix('recruiter')->group(function () {
    Route::get('home', 'RecruitersController@home');
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
    Route::get('/agenda/detail/{ticket}', 'AgendaController@detail');
    Route::patch('profil/{id}', 'RecruitersController@profilPicture');
    Route::get('account', 'RecruitersController@account');
    Route::patch('account/umum/{id}', 'RecruitersController@umum');
    Route::post('account/password', 'RecruitersController@password');
});

Route::prefix('candidate')->group(function () {
    Route::get('', 'CandidatesController@index');
    Route::post('search', 'CandidatesController@search');
});

Route::prefix('lowongan')->group(function () {
    Route::get('', 'VacanciesController@lowongan');
    Route::get('detail/{ticket}', 'VacanciesController@detail');
    Route::get('detail/apply/{ticket}', 'VacanciesController@apply');
    Route::post('apply', 'VacanciesController@StoreApply');
    Route::post('search', 'VacanciesController@search');
    Route::get('company/{id}', 'VacanciesController@company');
    Route::get('/apply/success', function () {
        return view('vacancies.success');
    });
});

// HRTime\PerformanceCounter
Route::prefix('account')->group(function () {
    Route::get('security', function () {
        return view('account.security');
    });
});

// Vacancy
Route::post('vacancy/store', 'VacanciesController@store');

/* User Section */
Route::prefix('user')->group(function () {
    // Dashboard
    Route::get('dashboard', 'SearcherController@index');
    Route::get('dashboard/{ticket}', 'SearcherController@indexSingle');
    Route::get('profil', 'SearcherController@profil');
    Route::get('profil/form', 'SearcherController@editprofil');
    Route::post('profil/store', 'SearcherController@StoreProfil');
    Route::patch('profil/foto/{id}', 'SearcherController@UpdateFoto');
    Route::match(['put', 'patch'], 'profil/store/{id}', 'SearcherController@UpdateProfil');
    // Pengalaman
    Route::get('pengalaman/form', 'SearcherController@EditPengalaman');
    Route::get('pengalaman/update/{id}', 'SearcherController@UpdatePengalaman');
    Route::post('pengalaman/store', 'SearcherController@StorePengalaman');
    Route::match(['put', 'patch'], 'pengalaman/store/{id}', 'SearcherController@UpdatePengalamanData');
    Route::match(['post', 'delete'], '/pengalaman/destroy/{id}', 'SearcherController@DestroyPengalaman');
    // Sertifikat
    Route::get('sertifikat/form', 'SearcherController@EditSertifikat');
    Route::get('sertifikat/update/{id}', 'SearcherController@UpdateSertifikat');
    Route::post('sertifikat/store', 'SearcherController@StoreSertifikat');
    Route::patch('sertifikat/update/store/{id}', 'SearcherController@UpdateSertifikatData');
    // Pendidikan
    Route::get('pendidikan/form', 'SearcherController@EditPendidikan');
    Route::post('pendidikan/store', 'SearcherController@StorePendidikan');
    Route::get('pendidikan/update/{id}', 'SearcherController@UpdatePendidikan');
    Route::match(['put', 'patch'], 'pendidikan/store/{id}', 'SearcherController@UpdatePendidikanData');
    Route::match(['post', 'delete'], '/pendidikan/destroy/{id}', 'SearcherController@DestroyPendidikan');
    // Skill
    Route::get('skill/form', 'SearcherController@EditSkill');
    Route::post('skill/store', 'SearcherController@StoreSkill');
    Route::delete('skill/destroy/{id}', 'SearcherController@DestroySkill');
    // Bookmark
    Route::get('/bookmark', 'BookmarksController@index');
    Route::post('/bookmark/store', 'BookmarksController@store');
    Route::match(['put', 'patch'], '/bookmark/destroy/{id}', 'BookmarksController@destroy');
    // Invite
    Route::get('/invite', 'SearcherController@inviter');
    Route::get('/invite/{id}', 'SearcherController@ShowInviter');
    Route::get('/lamaran', 'SearcherController@lamaran');
    // Account setting
    Route::get('account', 'SearcherController@security');
    Route::patch('account/umum/{id}', 'SearcherController@umum');
    Route::post('account/password', 'SearcherController@password');
});

Route::get('login', function () {
    return view('auth.login');
});
Route::get('perusahaan/registrasi', function () {
  return view('account.company-registrasi');
});
Route::get('daftar', function () {
  return view('account.registrasi');
});

Auth::routes();

Route::get('read/notification/{id}', 'NotifikasiController@readNotify');