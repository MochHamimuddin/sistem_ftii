<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
    return view('landingpage.beranda');
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
Route::get('/register',[AuthController::class, 'register'])->name('register.form');
Route::post('/prosesRegister', [AuthController::class, 'create'])->name('register.create');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*Route::group(['middleware' => ['auth:user', 'cekRole:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard.index');
});*/
Route::group(['middleware' => ['auth:user,mahasiswa', 'cekRole:admin,kaprodi,Koordinator MBKM,peserta']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard.index');
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
});
