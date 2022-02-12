<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\User\DashboardController;
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
// map('index1','abdc');

// Route::get('/data', 'App\Http\Controllers\Employer\EventController@index');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('guest');
Auth::routes();
Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' =>
    [
        'admin:admin', 'auth'
    ]], function () {
    Route::get('/home', 'DashboardController@home')->name('admin.home');
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/profile', 'DashboardController@edit')->name('candidate.profile.edit');
});

Route::group(['prefix' => 'employer', 'namespace' => 'App\Http\Controllers\Employer', 'middleware' => ['auth', 'employer:employer']], function () {

    //events
    Route::get('/events/all','JobController@events')->name('allevents');
    Route::put('fireEvent','JobController@fireEvent')->name("fireEvent");
    Route::get('getShortlistedEvents','JobController@getShortlistedEvents')->name("getShortlistedEvents");

    Route::get('/scheduler','EventController@home')->name('employer.schedule');
    Route::get('/home', 'DashboardController@home')->name('employer.home');
    Route::get('/dashboard', 'DashboardController@index')->name('employer.dashboard');
    Route::get('/profile', 'DashboardController@edit')->name('employer.profile.edit');
    //jobs
    Route::get('/createjob', 'JobController@index')->name('employer.createjob');
    Route::post('/createjob', 'JobController@create')->name('employer.createjob');
    Route::delete('/deletejob/{id}', 'JobController@delete')->name('employer.deletejob');

    Route::get('/viewapplications/{id}', 'JobController@applications')->name('employer.job.applications');
    Route::get('/viewapplication/{id}', 'JobController@application')->name('employer.job.application');
    Route::put('status/update/{id}','JobController@updateStatus')->name('application.status.update');
    Route::get('createcompany','CompanyController@create')->name('employer.company.create');
    Route::post('createcompany','CompanyController@store')->name('employer.create.company');
    Route::get('allcompanies','CompanyController@index')->name('employer.companies');
    Route::get('viewcompany/{id}','CompanyController@show')->name('employer.company.view');
    Route::get('editcompany/{id}','CompanyController@edit')->name('employer.company.edit');
    Route::put('companyupdate','CompanyController@update')->name('employer.company.update');
    Route::get('deletecompany/{id}','CompanyController@delete')->name('employer.company.delete');
    Route::get('company/jobs/{id}','JobController@companyJobs')->name('employer.company.jobs');
    Route::get('company/job/{id}','JobController@companyJob')->name('employer.company.job.view');
    Route::get('editcompany/job/{id}','JobController@editCompanyJob')->name('employer.company.job.edit');
    Route::put('editcompany/job/{id}','JobController@editCompanyJob')->name('employer.job.update');


});
Route::get('startCallRequestToRouter','App\Http\Controllers\Employer\JobController@loadReactRoutePage')->name('loadReactRoutePage');
Route::post('/sendlink','App\Http\Controllers\Employer\JobController@sendlink')->name('sendlink');
Route::group([
    'prefix' => 'candidate',
    'namespace' => 'App\Http\Controllers\Candidate',
    'middleware' => [
        'auth', 'candidate:candidate'
        ]
    ], function ()
{

    Route::get('/home', 'DashboardController@home')->name('candidate.home');
    Route::get('/profile', 'DashboardController@edit')->name('candidate.profile.edit');
    Route::get('/dashboard', 'DashboardController@index')->name('candidate.dashboard');
    Route::get('job/application/view/{id}','JobController@index')->name('candidate.job.application');
    Route::get('job/applications/view','ApplicationController@index')->name('candidate.applications');
    Route::post('job/applications/','ApplicationController@create')->name('candidate.applications.create');
    Route::post('/application/create/postajax','ApplicationController@create')->name('job.apply');
    Route::get('/shortlistedjobs','JobController@getShortlistedJobs')->name('getShortlistedJobs');
});

// Route::get('/admin/dashboard',)
Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Route::group('',function () {
Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

Route::get('reactRoute',[App\Http\Controllers\HomeController::class, 'reactRoute']);
Route::get('/logout',function() {
    Auth::logout();
    return redirect('/login');
});
