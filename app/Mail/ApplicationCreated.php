<?php

namespace App\Mail;

use App\Application;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Testing\File;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $application = $this->application;
        $application->load('reason');
        $application->load('files');

        $email = $this->markdown('emails.application.created')
                    ->with([
                        'date_created' => Carbon::now(),
                        'package_id' => $application->package_id,
                        'sent_date' => $application->sent_date,
                        'reason' => $application->reason->name,
                        'mess' => $application->message,
                        'url' => URL::to('/admin')

                    ]);

        // $attach files to email
        foreach($application->files as $file) {

            $filepath = Storage::disk('public')->url($file->path);

            //dd($filepath);

            $email->attach('storage/'.$file->path);
        }

        return $email;
    }
}
