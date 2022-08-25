<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'App\Http\Controllers\SearchController@getLocations');

Route::get('/register/doctor', 'App\Http\Controllers\Auth\RegisterController@showDoctor');

// Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index');

// Route::get('/contact', 'App\Http\Controllers\ContactController@index');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');

// Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Route::get('/appointments/{id}', [App\Http\Controllers\AppointmentController::class, 'show']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);

Route::get('/doctor', [App\Http\Controllers\DoctorController::class, 'index']);

Route::post('/addPatient', [App\Http\Controllers\Auth\RegisterController::class, 'registerPatient']);

// Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Route::get('/search', 'App\Http\Controllers\SearchController@showResults');

Route::post('/search', 'App\Http\Controllers\SearchController@search');

Route::post('/bookAppointment', [App\Http\Controllers\PatientController::class, 'bookAppointment']);
Route::post('/createAppointment', [App\Http\Controllers\AppointmentController::class, 'store']);


Route::get('/appointments', [App\Http\Controllers\PatientController::class, 'showAppointments']);

Route::get('/{id}/setTime"', [App\Http\Controllers\AppointmentController::class, 'setTime']);

// Route::get('/register', 'App\Http\Controllers\SearchController@getCitiesProvinces');
// Route::get('/{url}', function ($url) {

//     return Redirect::to('/');

// })->where(['url' => 'url1|url2|url3']);

Route::post('/updateStatus/{id}', [App\Http\Controllers\DoctorController::class, 'setStatus']);

Route::get('/downloadPDF/{id}', 'App\Http\Controllers\DoctorController@downloadPDF');
