<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Imagine\Image\Box;
use App\Models\Program;
use Imagine\Gd\Imagine;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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


    public function create(Request $request)
    {
        $programs = Program::all();
        $mhs = Mahasiswa::all();
        return view('masterdata.peserta_create',compact('programs','mhs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'=>'required|unique:mahasiswa,nim',
            'name'=>'required',
            'jenis_kelamin'=>'required',
            'semester'=>'required',
            'alamat' => 'required',
            'email'=>'required|unique:mahasiswa,email',
            'telpon' => 'required',
            'password' => 'required',
             'program_id' => 'required|exists:program,id'

        ],[
            'nim.required' => 'Mohon isi kolom NIM.',
            'nim.unique' => 'Nim sudah terdaftar.',
            'name.required' => 'Mohon isi kolom Nama.',
            'jenis_kelamin.required' => 'Mohon pilih Jenis Kelamin.',
            'semester.required' => 'Mohon isi kolom Semester.',
            'alamat.required' => 'Mohon isi kolom Alamat.',
            'email.required' => 'Mohon isi kolom Email.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'telpon.required' => 'Mohon isi kolom Telpon.',
            'password.required' => 'Mohon isi kolom Password.',
            'program_id.required' => 'Mohon pilih Program.',
            'program_id.exists' => 'Program tidak valid.',

        ]);
        $data = [
            'nim'=>$request->nim,
            'name'=>$request->name,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'semester'=>$request->semester,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'telpon'=>$request->telpon,
            'password'=>hash::make($request->password),
            'foto' => '1.png',
            'program_id'=>$request->program_id,
            'remember_token' => Str::random(60),
        ];
        Mahasiswa::create($data);
        Session::flash('status','success');
       Session::flash('message','Anda Berhasil Register, silahkan login');
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
    public function destroy(String $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->delete();
        alert()->success('Data Peserta Berhasil Di Edit');
        return redirect()->route('mhs.index')->with('success', 'Data Peserta berhasil dihapus');
    }
}