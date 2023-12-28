<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dosen;
use App\Models\Logbook;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logbooks = Logbook::where('mahasiswa_id', Auth::id())->get();

        return view('logbook.index', compact('logbooks'));
    }
    public function showLogbookForm($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Pastikan kegiatan mahasiswa berstatus "Lolos"
        $kegiatanLolos = $mahasiswa->Kegiatans()->where('status', 'Lolos')->first();

        if (!$kegiatanLolos) {
            return redirect()->back()->with('error', 'Anda tidak memiliki kegiatan yang lolos.');
        }

        $today = Carbon::now();
        $tanggalMulai = Carbon::parse($kegiatanLolos->tanggal_mulai);
        $tanggalAkhir = Carbon::parse($kegiatanLolos->tanggal_akhir);

        // Pastikan saat ini berada dalam rentang tanggal kegiatan
        if ($today->greaterThanOrEqualTo($tanggalMulai) && $today->lessThanOrEqualTo($tanggalAkhir)) {
            // Hitung jumlah minggu antara tanggal mulai dan akhir
            $jumlahMinggu = $tanggalMulai->diffInWeeks($tanggalAkhir);

            // Looping untuk membuat form logbook setiap minggu
            $weeklyLogbookForms = [];
            for ($i = 0; $i <= $jumlahMinggu; $i++) {
                $startOfWeek = $tanggalMulai->copy()->addWeeks($i)->startOfWeek();
                $endOfWeek = $tanggalMulai->copy()->addWeeks($i)->endOfWeek();

                // Simpan informasi rentang mingguan
                $weeklyLogbookForms[] = [
                    'startOfWeek' => $startOfWeek,
                    'endOfWeek' => $endOfWeek,
                ];
            }

            // Tampilkan form pengisian logbook untuk rentang waktu ini
            return view('logbook.create_logbook', compact('weeklyLogbookForms'));
        } else {
            return redirect()->back()->with('error', 'Anda hanya dapat mengakses logbook saat kegiatan berlangsung.');
        }
    }
    public function storeWeeklyLogbook(Request $request)
{
    // Mendapatkan ID mahasiswa yang sedang masuk
    $mahasiswaId = Auth::id();

    // Memastikan mahasiswa memiliki kegiatan yang berstatus "Lolos"
    $kegiatanLolos = Kegiatan::where('mahasiswa_id', $mahasiswaId)
                        ->where('status', 'Lolos')
                        ->first();

    // Jika mahasiswa tidak memiliki kegiatan yang lolos, kembalikan dengan pesan error
    if (!$kegiatanLolos) {
        return redirect()->back()->with('error', 'Anda tidak memiliki kegiatan yang lolos.');
    }

    // Validasi data yang diterima dari request
    $validatedData = $request->validate([
        'deskripsi' => 'required|array', // Deskripsi sebagai array
        'deskripsi.*' => 'required|string', // Setiap deskripsi dalam array harus string
        'tanggal_mulai' => 'required|date',
        'tanggal_akhir' => 'required|date',
    ]);

    // Mengonversi tanggal_mulai dan tanggal_akhir menjadi objek Carbon
    $startDate = Carbon::createFromFormat('Y-m-d', $validatedData['tanggal_mulai']);
    $endDate = Carbon::createFromFormat('Y-m-d', $validatedData['tanggal_akhir']);

    // Mendapatkan ID dosen secara acak dari tabel Dosen
    $dosenId = Dosen::inRandomOrder()->pluck('id')->first();

    // Looping untuk mengisi logbook mingguan
    while ($startDate->lte($endDate)) {
        // Membuat logbook untuk rentang waktu mingguan
        $logbook = new Logbook([
            'deskripsi' => $validatedData['deskripsi'][0], // Menggunakan deskripsi pertama dari array
            'tanggal_mulai' => $startDate->copy()->startOfWeek(), // Tanggal mulai rentang waktu mingguan
            'tanggal_akhir' => $startDate->copy()->endOfWeek(),
            'mahasiswa_id' => $mahasiswaId,
            'kegiatan_id' => $kegiatanLolos->id,
            'dosen_id' => $dosenId,
        ]);

        // Simpan logbook untuk rentang waktu mingguan
        $logbook->save();

        // Pindah ke minggu berikutnya
        $startDate->addWeek(); // Pindah ke minggu berikutnya
    }

    // Redirect ke halaman logbook dengan pesan sukses
    return redirect()->route('logbook.create')->with('success', 'Logbook mingguan berhasil disimpan');
}


public function create(Request $request)
{
    $mahasiswaId = Auth::id();
    $mahasiswa = Mahasiswa::find($mahasiswaId);

    // Pastikan kegiatan mahasiswa berstatus "Lolos"
    $kegiatanLolos = Kegiatan::where('status', 'Lolos')->first();

    if (!$kegiatanLolos) {
        return redirect()->back()->with('error', 'Anda tidak memiliki kegiatan yang lolos.');
    }

    // Ambil tanggal mulai dan akhir dari request jika tersedia, jika tidak, gunakan rentang default
    $startDate = $request->has('tanggal_mulai') ? Carbon::createFromFormat('Y-m-d', $request->input('tanggal_mulai')) : Carbon::parse($kegiatanLolos->tanggal_mulai);
    $endDate = $request->has('tanggal_akhir') ? Carbon::createFromFormat('Y-m-d', $request->input('tanggal_akhir')) : Carbon::parse($kegiatanLolos->tanggal_akhir);

    $dosenId = Dosen::inRandomOrder()->pluck('id')->first();
    // Simpan informasi rentang mingguan
    $weeklyLogbookForms = [];
    while ($startDate->lte($endDate)) {
        $startOfWeek = $startDate->startOfWeek();
        $endOfWeek = $startDate->copy()->endOfWeek();

        // Simpan informasi rentang mingguan
        $weeklyLogbookForms[] = [
            'startOfWeek' => $startOfWeek,
            'endOfWeek' => $endOfWeek,
        ];

        $startDate->addWeek(); // Pindah ke minggu berikutnya
    }

    return view('logbook.create_logbook', compact('mahasiswa', 'kegiatanLolos','dosenId', 'weeklyLogbookForms'));
}

    /**
     * Store a newly created resource in storage.
     */

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