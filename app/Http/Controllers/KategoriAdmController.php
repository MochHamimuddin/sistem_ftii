<?php

namespace App\Http\Controllers;

use App\Models\KategoriAdm;
use Illuminate\Http\Request;

class KategoriAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_adm = KategoriAdm::all();
        return view('administrasi.adminis',compact('kategori_adm'));
    }
    public function status($id)
    {
        $kategori_adm = KategoriAdm::find($id);

        if ($kategori_adm->status == 1) {
            $kategori_adm->status = 0;
        } else {
            $kategori_adm->status = 1;
        }
        $kategori_adm->save();
        alert()->success('Success','Status Kategori berhasil di update.');
        return redirect()->back()->with('success', 'Status Kategori updated successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrasi.adminis_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'tanggal_mulai'=>'required',
            'tanggal_akhir'=>'required',
            'status'=>'nullable',
        ],[
            'nama.required'=> 'Mohon Isi Kolom Nama Kategori',
            'tanggal_mulai.required'=> 'Mohon Isi Kolom Tanggal Mulai Administrasi',
            'tanggal_akhir.required'=> 'Mohon Isi Kolom Deadline Administrasi',
            'status.required'=> 'Mohon Isi Kolom Status'
        ]);
        KategoriAdm::create($request->all());

        return redirect()->route('kategori_adm.index')->with('success', 'Kategori administrasi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori_adm = KategoriAdm::find($id);
        return view('administrasi.adminis_detail', compact('kategori_adm'));
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