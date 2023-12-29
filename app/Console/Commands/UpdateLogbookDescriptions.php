<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Logbook;

class UpdateLogbookDescriptions extends Command
{
    protected $signature = 'logbook:update-descriptions';
    protected $description = 'Update descriptions in the logbook weekly';

    public function handle()
    {
        $currentDate = Carbon::now();
        $startDate = $currentDate->copy()->startOfWeek(); // Start of the current week
        $endDate = $startDate->copy()->endOfWeek(); // End of the current week

        // Logic to find logbook entries for the current week
        $logbooksToUpdate = Logbook::where('tanggal_mulai', '<=', $endDate)
            ->where('tanggal_akhir', '>=', $startDate)
            ->get();

        // Update the descriptions for logbook entries within the current week
        foreach ($logbooksToUpdate as $logbook) {
            $logbook->deskripsi = 'Description for Week ' . $startDate->weekOfYear;
            $logbook->save();
        }
    }
}