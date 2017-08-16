<?php

namespace App\Listeners;

use App\Events\ApplicationOnDelete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class DeleteFiles
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ApplicationOnDelete  $event
     * @return void
     */
    public function handle(ApplicationOnDelete $event)
    {
        $application = $event->application->load('files');

        foreach($application->files as $file) {

            Storage::disk('public')->delete($file->path);
            Storage::disk('public')->delete("resize/$file->path");
        }

        $event->application->files()->delete();
    }
}
