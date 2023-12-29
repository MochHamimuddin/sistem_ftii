<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dosen;
use App\Models\Logbook;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LogboookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logbook = Logbook::with('kegiatan','mahasiswa','dosen')->get();
        //dd($logbook);
        return view('logbook.index',compact('logbook'));
    }

    /**php artisan config:clear
php artisan cache:clear
composer dump-autoload
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatans = Kegiatan::with('mahasiswa')->get()->unique('mahasiswa_id');
        $dosens = Dosen::all();

        return view('logbook.create', compact('kegiatans', 'dosens'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'dosen_id' => 'required|exists:dosen,id',
        ]);

        $kegiatan = Kegiatan::find($validatedData['kegiatan_id']);

        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Kegiatan not found!');
        }

        $logbookData = [
            'tanggal_mulai' => $validatedData['tanggal_mulai'],
            'tanggal_akhir' => $validatedData['tanggal_akhir'],
            'mahasiswa_id' => $kegiatan->mahasiswa_id, // Mengambil mahasiswa_id dari relasi Kegiatan
            'kegiatan_id' => $validatedData['kegiatan_id'],
            'dosen_id' => $validatedData['dosen_id'],
        ];

        Logbook::create($logbookData);

        return redirect()->route('logbook.index')->with('success', 'Logbook entry created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $logbook = Logbook::with('kegiatan', 'mahasiswa', 'dosen')->find($id);
    return view('logbook.detail', compact('logbook'));
    }

    public function createDeskripsi($id){
        $logbook = Logbook::find($id);
        return view('logbook.create_deskripsi', compact('logbook'));
    }

    public function storeDeskripsi(Request $request, $id)
    {
        $validatedData = $request->validate([
            'deskripsi.*' => 'nullable|string' // Deskripsi dapat kosong atau berisi teks
        ]);

        $logbook = Logbook::findOrFail($id);

        if ($validatedData['deskripsi']) {
            $logbook->deskripsi = $validatedData['deskripsi'];
            $logbook->save();
            return redirect()->route('logbook.index')->with('success', 'Deskripsi berhasil diatur pada entri logbook yang ditentukan.');
        }

        $startDate = Carbon::parse($logbook->tanggal_mulai);
        $endDate = Carbon::parse($logbook->tanggal_akhir);
        $currentDate = Carbon::now();

        $weeksDifference = $startDate->diffInWeeks($currentDate);

        if ($currentDate->gte($startDate) && $currentDate->lte($endDate)) {
            $description = 'Deskripsi untuk minggu ke-' . ($weeksDifference + 1);
            $logbook->deskripsi = $description;
            $logbook->save();
            return redirect()->route('logbook.index')->with('success', 'Deskripsi berhasil diatur pada entri logbook yang ditentukan.');
        }

        return redirect()->route('logbook.index')->with('error', 'Deskripsi tidak dapat diatur untuk entri logbook yang ditentukan.');
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