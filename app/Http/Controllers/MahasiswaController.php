<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Imagine\Image\Box;
use App\Models\Program;
use Imagine\Gd\Imagine;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mhs = Mahasiswa::with('Kegiatan')->get();

        return view('masterdata.datapeserta', [
            'mhs' => $mhs,
        ]);
    }

    public function show($id)
{
    $mhs = Mahasiswa::find($id);
    $program = Program::find($mhs->program_id);
    if ($mhs) {
        $mitra = Mitra::find($program->mitra_id);

        return view('masterdata.peserta_detail', compact('mhs', 'mitra'));
    } else {
        return redirect()->route('mhs.index');
    }
}


    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $mhs = new Mahasiswa();
        $mhs->fill($request->all());
        $mhs->save();

        return redirect()->route('mhs.index');
    }
    public function edit($id)
    {
        $data = Program::all();
        $mhs = Mahasiswa::find($id);

        if (!$mhs) {
            return abort(404);
        }
        $programs = Program::find($mhs->program_id);
        $mitra = Mitra::find($programs->mitra_id);

        return view('masterdata.peserta_edit', compact('data','mhs', 'programs','mitra'));
    }

    public function update(Request $request, $id)
    {
        try {
            $mhs = Mahasiswa::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('mhs.edit', $id)->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        if ($request->hasFile('foto')) {
            $fileName = $mhs->foto;
            if ($fileName != 'siska.png') {
                File::delete(public_path('foto_peserta/img/' . $fileName));
            }

            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('foto_peserta/img'), $fileName);
            $mhs->foto = $fileName;
        }

        $mhs->fill($request->all());
        $mhs->save();

        return redirect()->route('mhs.show', $id)->with('success', 'Data mahasiswa berhasil diubah.');
    }
    public function destroy(Mahasiswa $mhs)
    {
        $mhs->delete();

        return redirect()->route('mhs.index');
    }
}