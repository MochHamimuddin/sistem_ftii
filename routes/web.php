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

Route::get('/homepage', function () {
    return view('landingpage.index');
});
Route::get('/homepage', function () {
    return view('landingpage.beranda');
});
Route::get('/kampusmerdeka', function () {
    return view('landingpage.km');
});