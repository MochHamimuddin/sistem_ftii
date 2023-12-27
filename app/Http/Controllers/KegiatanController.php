<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::with('mahasiswa')->get();
        $mahasiswas = Mahasiswa::all();
        return view('kegiatan.index', compact('kegiatans', 'mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mitras = Mitra::all();
        $programs = Program::all();
        $mahasiswas = Mahasiswa::all();
        return view('kegiatan.create',compact('mitras','programs','mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'foto' => 'nullable|image|max:2048', // Menambahkan validasi untuk file gambar (maksimum 2MB)
        'status' => 'required|in:Lolos,Tidak Lolos',
        'mitra_id' => 'required|exists:mitra,id',
        'program_id' => 'required|exists:program,id',
        'mahasiswa_id' => 'required|exists:mahasiswa,id',
    ]);

    // Mengunggah foto ke folder 'foto_peserta/img' di folder 'public'
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('foto_peserta/img', $fileName, 'public');

        // Menyimpan nama file foto dalam data yang akan disimpan ke database
        $validatedData['foto'] = $fileName;
    }

    // Simpan kegiatan baru ke database
    Kegiatan::create($validatedData);

    return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
}

    public function show($id)
    {
        // Menampilkan detail kegiatan
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Menampilkan form untuk mengedit kegiatan
    $kegiatan = Kegiatan::findOrFail($id);
    $mitras = Mitra::all();
    $programs = Program::all();
    $mahasiswas = Mahasiswa::all();
    return view('kegiatan.edit', compact('kegiatan', 'mitras', 'programs','mahasiswas'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'foto' => 'nullable|image|max:2048',
        'status' => 'required|in:Lolos,Tidak Lolos',
        'mitra_id' => 'required|exists:mitra,id',
        'program_id' => 'required|exists:program,id',
        'mahasiswa_id' => 'required|exists:mahasiswa,id',
    ]);

    // Mengunggah foto ke folder 'foto_peserta/img' di folder 'public'
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('foto_peserta/img', $fileName, 'public');

        // Menyimpan nama file foto dalam data yang akan disimpan ke database
        $validatedData['foto'] = $fileName;
    }

    // Update kegiatan yang ada
    Kegiatan::whereId($id)->update($validatedData);

    return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus kegiatan
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}