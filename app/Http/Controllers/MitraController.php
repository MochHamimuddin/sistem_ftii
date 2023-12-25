<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitra = Mitra::all();
        return view ('masterdata.datamitra',compact('mitra'));
    }
    public function create(Request $request)
    {
        $mitra = Mitra::all();
        return view('masterdata.mitra_create',compact('mitra'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png'
        ],[
            'nama.required' => 'Mohon Isi Kolom Nama Mitra',
            'foto.image' => 'File yang diunggah harus berupa gambar',
            'foto.mimes' => 'File yang diunggah hanya boleh berformat jpeg, jpg, atau png'
        ]);
        $data = [
            'nama'=>$request->nama,
        ];
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto_mitra/img/'), $nama_foto);
            $data['foto'] = $nama_foto;
        }
        Mitra::create($data);
        return redirect()->route('mitra.index')->with('success', 'Data Mitra Berhasil Ditambahkan');
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mitra = Mitra::find($id);
        return view('masterdata.mitra_edit',compact('mitra'));
    }
    public function update(Request $request, string $id)
    {
        try {
            $mitra = Mitra::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('mitra.edit', $id)->with('error', 'Data Mitra tidak ditemukan.');
        }

        if ($request->hasFile('foto')) {
            $fileName = $mitra->foto;
            if ($fileName != $mitra->foto) {
                File::delete(public_path('foto_mitra/img/' . $fileName));
            }

            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('foto_mitra/img'), $fileName);
            $mitra->foto = $fileName;
        }

        $mitra->fill($request->all());
        $mitra->save();

        return redirect()->route('mitra.index', $id)->with('success', 'Data Mitra berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();
        alert()->success('Data Mitra Berhasil Di Edit');
        return redirect()->route('mitra.index')->with('success', 'Data Mitra berhasil dihapus');
    }
}