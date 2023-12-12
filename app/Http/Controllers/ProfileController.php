<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Program;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $id = auth()->user()->id;
        $rs = Mahasiswa::find($id);

        if (!$rs) {
            return abort(404);
        }
        $programs = Program::find($rs->program_id);
        $mitra = Mitra::find($programs->mitra_id);
        $data = Program::all();
        return view('profilepeserta.profile', compact('rs','data', 'programs','mitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //d
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Program::all();
        $rs = Mahasiswa::find($id);

        if (!$rs) {
            return abort(404);
        }
        $programs = Program::find($rs->program_id);
        $mitra = Mitra::find($programs->mitra_id);

        return view('profilepeserta.profile', compact('data','rs', 'programs', 'mitra'));
    }
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'foto'=> 'nullable|mimes:jpg,jpeg,svg,png'
        ]);
        $rs = Mahasiswa::findOrFail($id);

        if (!$rs) {
            return abort(404);
        }
        $file = $request->file('foto');
        $name = 'FTII'.date('Ymhdis').'.'.$request->file('foto')->getClientOriginalExtension();
        $resize_foto = Image::make($file->getRealPath());
        $resize_foto->resize(200,200,function($constraint){
           $constraint->aspectRatio();
        })->save('foto_peserta'.$name);
        $rs->save();

        $rs->nim = $request->input('nim');
        $rs->name = $request->input('name');
        $rs->jenis_kelamin = $request->input('jenis_kelamin');
        $rs->semester = $request->input('semester');
        $rs->alamat = $request->input('alamat');
        $rs->email = $request->input('email');
        $rs->telpon = $request->input('telpon');
        $rs->program_id = $request->input('program_id');
        $rs->foto = $name;

        return redirect()->route('profile.index', $rs->id)->with('success', 'Profile updated successfully');
    }

    public function changePasswordForm($id)
    {
        $data = Program::all();
        $rs = Mahasiswa::find($id);

        if (!$rs) {
            return abort(404);
        }
        $programs = Program::find($rs->program_id);
        $mitra = Mitra::find($programs->mitra_id);

        return view('profilepeserta.profile', compact('data','rs', 'programs', 'mitra'));
    }
    public function gantiPassword(Request $request, string $id)
    {
    $rs = Mahasiswa::find($id);

    if (!$rs) {
        return abort(404);
    }
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    if (!Hash::check($request->input('current_password'), $rs->password)) {
        return redirect()->back()->with('error', 'Password saat ini salah.');
    }

    // Update password baru
    $newPassword = $request->input('new_password');
    $rs->password = Hash::make($newPassword);
    $rs->save();

    Session::flash('status', 'success');
    Session::flash('message', 'Anda Berhasil Mengganti Password');

    return redirect()->route('profile.index', $rs->id)->with('success', 'Password berhasil diubah');
    }

    public function destroy(string $id)
    {
        //
    }
}