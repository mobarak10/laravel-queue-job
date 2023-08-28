<?php

namespace App\Console\Commands;

use App\Jobs\SendTestMailJob;
use App\Mail\SendOtpMail;
use Illuminate\Console\Command;

class GenerateQueueJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-queue-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i = 0; $i < 100; $i++) {
            dispatch(new SendTestMailJob($i));
        }
    }
}
