<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use App\Models\KategoriAdm;
use App\Models\Administrasi;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index()
    {
        $administrasi = Administrasi::with('mahasiswa', 'kategori_adm')->get();
        $mahasiswa = Mahasiswa::all();
        $kategoriAdm = KategoriAdm::all();

        return view('administrasi.adminis_peserta', compact('administrasi', 'mahasiswa', 'kategoriAdm'));
    }

    public function upload(Request $request, $kategori_adm_id)
{
    $request->validate([
        'berkas' => 'required|mimes:pdf|max:2048'
    ]);

    $mahasiswa_id = auth()->user()->id;

    $file = $request->file('berkas');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('berkas_adm', $fileName);

    $waktuWIB = Carbon::now('Asia/Jakarta');

    Administrasi::create([
        'mahasiswa_id' => $mahasiswa_id,
        'kategori_adm_id' => $kategori_adm_id,
        'tanggal_pengumpulan' => $waktuWIB,
        'berkas' => $filePath,
        'keterangan' => '0',
    ]);


    return redirect()->back()->with('success', 'Berkas berhasil diunggah!');
}

}
