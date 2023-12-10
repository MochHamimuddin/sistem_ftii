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
        return view('profilepeserta.profile', compact('rs', 'programs','mitra'));
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
        $rs = Mahasiswa::find($id);

        if (!$rs) {
            return abort(404);
        }

        $programs = Program::find($rs->program_id);
        $mitra = Mitra::find($programs->mitra_id);

        return view('profilepeserta.profile', compact('rs', 'programs', 'mitra'));
    }
    public function update(Request $request, string $id)
    {
        $rs = Mahasiswa::find($id);

        if (!$rs) {
            return abort(404);
        }   
        $rs->nama = $request->input('nama');
        $rs->email = $request->input('email');
        $rs->no_telpon = $request->input('no_telpon');
        $rs->alamat = $request->input('alamat');
        // Update kolom lain yang perlu diubah
    
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