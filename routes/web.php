<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdmAdminController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LogboookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KategoriAdmController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\KegiatanPesertaController;

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
    Route::get('/profile/{id}/ubah-sandi', [ProfileController::class, 'changePasswordForm'])->name('sandi.form')->middleware('password.change');
    Route::post('/profile/{id}', [ProfileController::class, 'gantiPassword'])->name('sandi.proses')->middleware('password.change');
    Route::get('/datapeserta', [MahasiswaController::class, 'index'])->name('mhs.index');
    Route::get('/datapeserta/{id}', [MahasiswaController::class, 'show'])->name('mhs.show');
    Route::get('/datapeserta-edit/{id}', [MahasiswaController::class, 'edit'])->name('mhs.edit');
    Route::put('/datapeserta-edit/{id}', [MahasiswaController::class, 'update'])->name('mhs.update');
    Route::get('/datapeserta_create', [MahasiswaController::class, 'create'])->name('mhs_create.form');
    Route::post('/datapeserta_proses', [MahasiswaController::class, 'store'])->name('mhs_create.proses');
    Route::delete('/deletedata/{id}', [MahasiswaController::class, 'destroy'])->name('mhs.delete');
    Route::get('/datadosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dospem_create', [DosenController::class, 'create'])->name('dosen_create.form');
    Route::post('/datadosen_proses', [DosenController::class, 'store'])->name('dosen_create.proses');
    Route::get('/datadosen/{id}', [DosenController::class, 'show'])->name('dosen.show');
    Route::get('/datadosen-edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/datadosen-edit/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/deletedosen/{id}', [DosenController::class, 'destroy'])->name('dosen.delete');
    Route::get('/datamitra', [MitraController::class, 'index'])->name('mitra.index');
    Route::get('/datamitra_create', [MitraController::class, 'create'])->name('mitra_create.form');
    Route::post('/datamitra_proses', [MitraController::class, 'store'])->name('mitra_create.proses');
    Route::get('/datamitra-edit/{id}', [MitraController::class, 'edit'])->name('mitra.edit');
    Route::put('/datamitra-edit/{id}', [MitraController::class, 'update'])->name('mitra.update');
    Route::delete('/deletemitra/{id}', [MitraController::class, 'destroy'])->name('mitra.delete');
    Route::get('/kategori_adm/{id}', [AdministrasiController::class, 'show'])->name('adm.show');
    Route::get('/administrasi', [AdministrasiController::class, 'index'])->name('administrasi.index');
    Route::post('/administrasi/upload/{kategori_adm_id}', [AdministrasiController::class, 'upload'])->name('administrasi.upload');
    Route::get('/view-administrasi', [AdmAdminController::class, 'viewAdministrasi'])->name('view_administrasi');
    Route::get('/kategori-adm', [AdmAdminController::class, 'index'])->name('kategori_adm.index');
    Route::get('/kategori-adm/{id}/status', [AdmAdminController::class, 'status'])->name('kategori_adm.status');
    Route::get('/view-file/{id}', [AdmAdminController::class, 'viewFile'])->name('view_file');
    Route::get('/kategori-adm/{id}/detail', [AdmAdminController::class, 'detailAdminis'])->name('adminis.detail');
    Route::get('/kategori-adm/create', [AdmAdminController::class, 'create'])->name('kategori_adm.create');
    Route::post('/kategori-adm/store', [AdmAdminController::class, 'store'])->name('kategori_adm.store');
    Route::get('/kategori_adm/{id}/edit', [AdmAdminController::class, 'edit'])->name('kategori_adm.edit');
    Route::put('/kategori_adm/{id}', [AdmAdminController::class, 'update'])->name('kategori_adm.update');
    Route::delete('/kategori_adm/{id}', [AdmAdminController::class, 'destroy'])->name('kategori_adm.destroy');
    Route::put('/kategori-adm/{id}/approve', [AdmAdminController::class, 'approveBerkas'])->name('administrasi.approve');
    Route::get('/kategori-adm/{id}/keterangan', [AdmAdminController::class, 'Keterangan'])->name('kategori_adm.keterangan');
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
    Route::get('/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
    Route::get('/kegiatan_peserta_create', [KegiatanPesertaController::class, 'create'])->name('kegiatan_peserta.create');
    Route::post('/kegiatan_peserta', [KegiatanPesertaController::class, 'store'])->name('kegiatan_peserta.store');
    Route::get('/detail_kegiatan', [KegiatanPesertaController::class, 'showAll'])->name('kegiatan_peserta.showAll');
    Route::get('/data_logbook', [LogboookController::class, 'index'])->name('logbook.index');
    Route::get('/data_logbook/create', [LogboookController::class, 'create'])->name('logbook.create');
    Route::post('/data_logbook/store', [LogboookController::class, 'store'])->name('logbook.store');
    Route::get('/data_logbook/{id}', [LogboookController::class, 'show'])->name('logboook.show');
    Route::get('/data_logbook/{id}/create-deskripsi', [LogboookController::class, 'createDeskripsi'])->name('logbook.create_deskripsi');
    Route::post('/data_logbook/store-deskripsi/{id}', [LogboookController::class, 'storeDeskripsi'])->name('logbook.store_deskripsi');
});
