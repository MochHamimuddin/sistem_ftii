<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{
    public function create()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $kegiatanLolos = $mahasiswa->Kegiatan()->where('status', 'Lolos')->first();

        if (!$kegiatanLolos) {
            return redirect()->back()->with('error', 'Anda belum memiliki kegiatan yang lolos.');
        }

        return view('logbook.create', [
            'kegiatan' => $kegiatanLolos,
            'tanggalMulai' => $kegiatanLolos->tanggal_mulai,
            'tanggalAkhir' => $kegiatanLolos->tanggal_akhir,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi.*' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_mulai',
        ]);

        $mahasiswa = Auth::user()->mahasiswa;
        $kegiatanId = $request->kegiatan_id;

        $tanggalMulai = $request->tanggal_mulai;
        $tanggalAkhir = $request->tanggal_akhir;

        while ($tanggalMulai <= $tanggalAkhir) {
            $logbook = new Logbook([
                'deskripsi' => $request->input('deskripsi')[$tanggalMulai->format('Y-m-d')],
                'tanggal_mulai' => $tanggalMulai,
                'tanggal_akhir' => $tanggalAkhir,
                'kegiatan_id' => $kegiatanId,
                'mahasiswa_id' => $mahasiswa->id,
            ]);
            $logbook->save();
            $tanggalMulai->addDay();
        }

        return redirect()->route('logbook.index')->with('success', 'Logbook berhasil ditambahkan.');
    }

    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $logbooks = $mahasiswa->logbooks;

        return view('logbook.index', ['logbooks' => $logbooks]);
    }
}