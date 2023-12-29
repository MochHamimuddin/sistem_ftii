<?php

namespace App\Console;

use Commands\UpdateLogbookDescriptions;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('deskripsi:create')->weekly()->sundays()->at('01:00');

       $schedule->command('deskripsi:store')->weekly()->saturdays()->at('00:30');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

    }
    protected $commands = [
        Commands\UpdateLogbookDescriptions::class,
        Commands\CreateDeskripsi::class,
        Commands\StoreDeskripsi::class,
    ];
}