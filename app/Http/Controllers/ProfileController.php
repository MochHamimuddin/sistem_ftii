<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Program;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

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
        $rs = Mahasiswa::findOrFail($id);

        if (!$rs) {
            return abort(404);
        }
        $rs->nim = $request->input('nim');
        $rs->name = $request->input('name');
        $rs->jenis_kelamin = $request->input('jenis_kelamin');
        $rs->semester = $request->input('semester');
        $rs->alamat = $request->input('alamat');
        $rs->email = $request->input('email');
        $rs->telpon = $request->input('telpon');
        $rs->program_id = $request->input('program_id');

        $rs->save();

        return redirect()->route('profile.index', $rs->id)->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}