<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use App\Models\KategoriAdm;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    ]);
    return redirect()->back()->with('success', 'Berkas berhasil diunggah!');
}
public function editBerkas($kategori_adm_id)
{
    $administrasi = Administrasi::where('kategori_adm_id', $kategori_adm_id)->first();

    if (!$administrasi) {
        return redirect()->back()->with('error', 'Berkas tidak ditemukan!');
    }

    return view('administrasi.edit_berkas', compact('administrasi'));
}

    public function updateBerkas(Request $request, $administrasi_id)
    {
    $request->validate([
        'berkas' => 'required|mimes:pdf|max:2048'
    ]);
    $administrasi = Administrasi::find($administrasi_id);

    if (!$administrasi) {
        return redirect()->back()->with('error', 'Berkas tidak ditemukan!');
    }
    $file = $request->file('berkas');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('berkas_adm', $fileName);
    Storage::delete($administrasi->berkas);
    $administrasi->update([
        'berkas' => $filePath,
    ]);

    return redirect()->back()->with('success', 'Berkas berhasil diubah!');
    }
}
