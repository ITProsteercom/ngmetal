<?php

namespace App\Console;

use App\Photo;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {

            //get all file without related application
            $temp_files = Photo::where('application_id', NULL)->get(['id', 'path']);

            //delete file from storage
            $file_names = array_column($temp_files->toArray(), 'path');
            Storage::disk('public')->delete($file_names);

            //delete file from db
            $file_ids = array_column($temp_files->toArray(), 'id');
            Photo::destroy($file_ids);

        })->daily();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
