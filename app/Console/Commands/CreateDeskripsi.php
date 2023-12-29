<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Logbook;
use Carbon\Carbon;

class CreateDeskripsi extends Command
{
    protected $signature = 'app:create-deskripsi';
    protected $description = 'Menyetel deskripsi pada entri logbook';

    public function handle()
    {
        // Ambil semua entri logbook yang diperlukan
        $logbooks = Logbook::where('status', 'Lolos')->get();

        foreach ($logbooks as $logbook) {
            // Ambil tanggal_mulai dan tanggal_akhir
            $startDate = Carbon::parse($logbook->tanggal_mulai);
            $endDate = Carbon::parse($logbook->tanggal_akhir);
            $currentDate = Carbon::now();

            // Hitung perbedaan minggu dari tanggal_mulai hingga sekarang
            $weeksDifference = $startDate->diffInWeeks($currentDate);

            if ($currentDate->gte($startDate) && $currentDate->lte($endDate)) {
                // Atur deskripsi untuk setiap minggu dari awal hingga akhir tanggal yang ditentukan
                $description = 'Deskripsi untuk minggu ke-' . ($weeksDifference + 1);
                $logbook->deskripsi = $description;
                $logbook->save();
            }
        }

        $this->info('Deskripsi berhasil diatur pada entri logbook yang ditentukan.');
    }
}
