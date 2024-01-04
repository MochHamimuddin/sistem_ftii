<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\FinalProject;
use Illuminate\Http\Request;

class FinalProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = FinalProject::with('mahasiswa')->get();

        return view('final_project.index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all(); // Ambil semua data mahasiswa
        return view('final_project.create', compact('mahasiswas'));
    }
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'berkas_final' => 'required|mimes:pdf',
        'status' => 'required',
        'foto' => 'required|mimes:jpg,jpeg,png',
        'mahasiswa_id' => 'required'
    ]);
    $foto = $request->file('foto');
    $namaFoto = $foto->getClientOriginalName();
    $foto->move(public_path('foto_final/img'), $namaFoto);

    $pdf = $request->file('berkas_final');
    $namaPdf = $pdf->getClientOriginalName();
    $pdf->move(public_path('data_berkas'), $namaPdf);

    // Simpan data ke dalam array
    $data = [
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'berkas_final' => $namaPdf, // Simpan jalur file PDF
        'status' => $request->status,
        'foto' =>  $namaFoto, // Simpan jalur file foto
        'mahasiswa_id' => $request->mahasiswa_id
    ];
    FinalProject::create($data);

    return redirect()->route('final.index')->with('success', 'Proyek berhasil dibuat!');
}
public function show($id)
{
    $project = FinalProject::with('mahasiswa')->findOrFail($id);
    return view('final_project.show', compact('project'));
}

public function edit($id)
{
    $project = FinalProject::findOrFail($id);
    $mahasiswas = Mahasiswa::all();
    return view('final_project.edit', compact('project', 'mahasiswas'));
}

    public function update(Request $request, $id)
    {
    $project = FinalProject::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'berkas_final' => 'nullable|mimes:pdf',
        'status' => 'required',
        'foto' => 'nullable|mimes:jpg,jpeg,png',
        'mahasiswa_id' => 'required'
    ]);

    $data = [
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
        'mahasiswa_id' => $request->mahasiswa_id
    ];

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $namaFoto = $foto->getClientOriginalName();
        $foto->move(public_path('foto_final/img'), $namaFoto);
        $data['foto'] = $namaFoto;
    }

    if ($request->hasFile('berkas_final')) {
        $pdf = $request->file('berkas_final');
        $namaPdf = $pdf->getClientOriginalName();
        $pdf->move(public_path('data_berkas'), $namaPdf);
        $data['berkas_final'] = $namaPdf;
    }

    $project->update($data);

    return redirect()->route('final.show', $id)->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
    $project = FinalProject::findOrFail($id);
    $project->delete();

    return redirect()->route('final.index')->with('success', 'Proyek berhasil dihapus!');
    }
}