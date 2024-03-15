<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/matakuliah', function () {
    try {
        $response = Http::withHeaders([
            'API-key' => 'Token',
            'API-value' => '$2y$10$wrzzecYnOAAC1OFayVykuOp2eYQLlSEaKfcHNQrdpLV.hJMdygjIC',
            'Content-Type' => 'application/json',
        ])->post('https://main-api.uhamka.ac.id/api/get/matakuliah', [
            'key' => 'kode_prodi',
            'value' => '0411'
        ]);
        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Gagal mengambil data dari API'], $response->status());
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Terjadi kesalahan saat mengambil data dari API'], 401);
    }
});