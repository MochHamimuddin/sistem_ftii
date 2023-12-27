<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
    $mitras = Mitra::all();
    $programs = Program::all();
    $mahasiswa = Auth::user();
    if ($mahasiswa) {
        $mahasiswa_id = $mahasiswa->id;
    } else {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
    }

    return view('kegiatan.peserta_create', compact('mitras', 'programs', 'mahasiswa_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $mahasiswa = Auth::user();
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'foto' => 'nullable|image|max:2048',
        'status' => 'required|in:Lolos,Tidak Lolos',
        'mitra_id' => 'required|exists:mitra,id',
        'program_id' => 'required|exists:program,id',
    ]);
    if ($mahasiswa) {
        $validatedData['mahasiswa_id'] = $mahasiswa->id;
    } else {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
    }
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('foto_peserta/img', $fileName, 'public');
        $validatedData['foto'] = $fileName;
    }
    Kegiatan::create($validatedData);

    return redirect()->route('kegiatan_peserta.create')->with('success', 'Kegiatan berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        $mahasiswa = Auth::user();
        $mahasiswa_id = $mahasiswa->id;

        $kegiatans = Kegiatan::where('mahasiswa_id', $mahasiswa_id)->get();

        return view('kegiatan.detail_peserta', compact('kegiatans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}