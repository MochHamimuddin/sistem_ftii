<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login', function () {
    return view('layout.login');
});
Route::get('/register', function () {
    return view('layout.register');
});

Route::get('/dashboard', function () {
    return view('admin.index');
});