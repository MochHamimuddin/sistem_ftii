<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Administrasi;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adm = Administrasi::all();
        return view('administrasi.adminis',compact('adm'));
    }
    public function status($id)
    {
        $adm = Administrasi::find($id);

        if ($adm->status == 1) {
            $adm->status = 0;
        } else {
            $adm->status = 1;
        }
        $adm->save();
        alert()->success('Success','Status administrasi berhasil di update.');
        return redirect()->back()->with('success', 'Status administrasi updated successfully.');
    }
    public function create()
    {
        $adm = Administrasi::all();
        $mhs = Mahasiswa::all();
        return view('administrasi.adminis',compact('adm','mhs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'status' => 'nullable',
            'tanggal' => 'required',
            'berkas' => 'nullable|mimes:pdf,docx,doc',
            'mahasiswa_id' => 'required|exists:mahasiswa,id'
        ],[
            'nama.required' => 'Mohon isi kolom jenis administrasi',
            'tanggal' => 'Mohon isi tanggal',
        ]);
        $data = [
            'nama'=>$request->nama,
            'status' => '1',
            'tanggal' => $request->tanggal,
            'mahasiswa_id' => $request->mahasiswa_id
        ];


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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