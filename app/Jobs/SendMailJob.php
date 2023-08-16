<?php

namespace App\Jobs;

use App\Mail\RegistrationSuccessMail;
use App\Mail\UserReportMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;

    /**
     * Create a new job instance.
     */
    public function __construct($request)
    {
        //
        $this->request = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // send registration success mail
        Mail::to($this->request->email)->send(new RegistrationSuccessMail($this->request));

        // mail send to admin
        Mail::to('admin@somewebsite.com')->send(new UserReportMail());
    }
}
