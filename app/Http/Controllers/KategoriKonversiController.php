<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriKonversi;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KategoriKonversiImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KategoriKonversiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriKonversi = KategoriKonversi::all();
        return view('kategoriKonversi.index',compact('kategoriKonversi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('kategoriKonversi.create');
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'kode_mk' => 'required',
        'nama' => 'required',
        'jumlah_sks' => 'required',
    ]);

    KategoriKonversi::create($validatedData);

    return redirect()->route('kategoriKonversi.index')->with('success', 'Kategori konversi berhasil ditambahkan');
    }

    public function importExcel(KategoriKonversiImport $import, Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
        ], [
            'file.mimes' => 'File harus berupa xls atau xlsx',
            'file.required' => 'Kolom file tidak boleh kosong'
        ]);

        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $path = 'DataMK/' . $namafile;

        try {
            // Check if the file exists in the storage directory
            if (!Storage::exists($path)) {
                // File doesn't exist, store the new file
                Storage::putFileAs('DataMK', $data, $namafile);
            }

            // Now, proceed to import the data from the file to the database
            Excel::import($import, storage_path('app/' . $path));
            $importedRows = $import->getRowCount();

            // Delete the file after importing its content to the database
            Storage::delete($path);

            return redirect()->route('kategoriKonversi.index')->with('success', 'Berhasil mengimpor ' . $importedRows . ' baris Kategori Konversi.');
        } catch (\Throwable $th) {
            // Delete the file if an error occurs during import
            if (Storage::exists($path)) {
                Storage::delete($path);
            }

            return redirect()->route('kategoriKonversi.index')->with('error', 'Gagal mengimpor data Kategori Konversi: ' . $th->getMessage());
        }
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