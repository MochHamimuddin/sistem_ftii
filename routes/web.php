<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('landingpage.index');
});
Route::get('/homepage', function () {
    return view('landingpage.index');
});
Route::get('/homepage', function () {
    return view('landingpage.beranda');
});
Route::get('/kampusmerdeka', function () {
    return view('landingpage.km');
});
Route::get('/magenta', function () {
    return view('landingpage.magen');
});
Route::get('/internalftii', function () {
    return view('landingpage.internal');
});
Route::get('/login', [AuthController::class, 'login'])->name('login.form')->middleware('guest');
Route::post('/login-proses', [AuthController::class, 'prosesLogin'])->name('login.process')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('admin.index');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/profile', function () {
    return view('profilepeserta.profile');
});
Route::get('/dospem', function () {
    return view('masterdata.datadospem');
});
Route::get('/mitra', function () {
    return view('masterdata.datamitra');
});
Route::get('/peserta', function () {
    return view('masterdata.datapeserta');
});
Route::get('/administrasi', function () {
    return view('administrasi.adminis');
});