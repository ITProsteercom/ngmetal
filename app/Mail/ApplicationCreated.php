<?php

namespace App\Mail;

use App\Application;
use App\Setting;
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

        $emailFrom = $this->getEmailFrom();

        $email = $this->from($emailFrom['address'], $emailFrom['name'])
                    ->to($this->getEmailTo())
                    ->markdown('emails.application.created')
                    ->with([
                        'date_created' => Carbon::now(),
                        'package_id' => $application->package_id,
                        'sent_date' => $application->sent_date,
                        'reason' => $application->reason->name,
                        'mess' => $application->message,
                        'url' => URL::to('/admin')
                    ]);

        // attach files to email
        foreach($application->files as $file) {

            $email->attach('storage/'.$file->path);
        }

        return $email;
    }

    /**
     * get mail address from settings or default values from env file and config
     * @return array
     */
    private function getEmailFrom() {

        $appName = Setting::getValue('APP_NAME');
        $emailFromAddress = Setting::getValue('MAIL_FROM_ADDRESS');

        $emailFrom = [
            'address' => ($emailFromAddress) ?  $emailFromAddress : env('MAIL_FROM_ADDRESS'),
            'name' => ($appName) ? $appName : config('app.name')
        ];

        return $emailFrom;
    }

    /**
     * get admin email from settings or default value from env file
     * @return mixed
     */
    private function getEmailTo() {

        $adminEmail = Setting::getValue('admin_email');

        return ($adminEmail) ?  $adminEmail : config('mail.ADMIN_EMAIL');
    }
}
