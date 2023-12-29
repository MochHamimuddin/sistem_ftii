<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Logbook;
use Illuminate\Console\Command;

class StoreDeskripsi extends Command
{
    protected $signature = 'deskripsi:store';
    protected $description = 'SETIAP SATU MINGGU SEKALI';

    public function handle()
    {
        // Ambil entri logbook yang ingin disimpan deskripsinya
        $logbooks = Logbook::where('status', 'Lolos')->get();

        foreach ($logbooks as $logbook) {
            // Hitung perbedaan minggu dari tanggal_mulai hingga sekarang
            $startDate = Carbon::parse($logbook->tanggal_mulai);
            $endDate = Carbon::parse($logbook->tanggal_akhir);
            $currentDate = Carbon::now();

            if ($currentDate->greaterThanOrEqualTo($startDate) && $currentDate->lessThanOrEqualTo($endDate)) {
                $weeksDifference = $startDate->diffInWeeks($currentDate);
                $description = 'Deskripsi untuk minggu ' . ($weeksDifference + 1);
                $logbook->deskripsi = $description;
                $logbook->save();
            }
        }

        $this->info('Deskripsi berhasil disimpan untuk entri logbook yang telah ditentukan.');
    }
}