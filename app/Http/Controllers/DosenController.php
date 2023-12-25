<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::all();
        return view('masterdata.datadospem',compact('dosen'));
    }
    public function create(Request $request)
    {
        $dosen = Dosen::all();
        return view('masterdata.dospem_create',compact('dosen'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode_dosen' => 'required|unique:dosen,kode_dosen',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:dosen,email',
            'telpon' => 'required',
            'password' => 'required',
            'foto' => 'nullable'
        ],[
            'kode_dosen.required' => 'Mohon Isi Kolom NIDN',
            'kode_dosen.unique' => 'NIDN Sudan terpakai',
            'nama.required' => 'Mohon Isi Kolom Nama',
            'jenis_kelamin.required' => 'Mohon Isi Jenis Kelamin',
            'alamat.required' => 'Mohon isi kolom Alamat',
            'email.required' => 'Mohon isi kolom Email.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'telpon.required' => 'Mohon isi kolom Telpon.',
            'password.required' => 'Mohon isi kolom Password.',
        ]);
        $data = [
            'kode_dosen'=>$request->kode_dosen,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'telpon'=>$request->telpon,
            'password'=>hash::make($request->password),
            'foto' => '1.png',
        ];
        Dosen::create($data);
        return redirect()->route('dosen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosen = Dosen::find($id);
        return view('masterdata.dospem_detail', compact('dosen'));
    }
    public function edit(string $id)
    {
        $dosen = Dosen::find($id);
        return view('masterdata.dospem_edit',compact('dosen'));
    }
    public function update(Request $request, string $id)
    {
        try {
            $dosen = Dosen::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('dosen.edit', $id)->with('error', 'Data Dosen tidak ditemukan.');
        }

        if ($request->hasFile('foto')) {
            $fileName = $dosen->foto;
            if ($fileName != '1.png') {
                File::delete(public_path('foto_peserta/img/' . $fileName));
            }

            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('foto_peserta/img'), $fileName);
            $dosen->foto = $fileName;
        }

        $dosen->fill($request->all());
        if ($request->password) {
            $dosen->password = Hash::make($request->password);
        }
        $dosen->save();

        return redirect()->route('dosen.show', $id)->with('success', 'Data dosen berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        alert()->success('Data dosen Berhasil Di Edit');
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}