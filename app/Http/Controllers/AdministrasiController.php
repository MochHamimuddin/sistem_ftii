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
        $rs = Mahasiswa::all();

        if (!$rs) {
            return abort(404);
        }
        return view('administrasi.adminis', compact('adm','rs'));
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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