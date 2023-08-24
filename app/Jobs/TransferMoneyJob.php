<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TransferMoneyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $amount;

    /**
     * Create a new job instance.
     */
    public function __construct($amount)
    {
        //
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->amount > 100 && $this->attempts() < 3) {
            throw new \Exception("BDT {$this->amount} Money transfer fail");
        }
        echo "BDT {$this->amount} is transfer successfully. Attempts: {$this->attempts()}   ";
    }

    public function failed($exception = null)
    {
        echo "BDT {$this->amount}, Attempts: {$this->attempts()}";
//        Mail::send([], [], function ($msg) {
//            $msg->to('admin@gmail.com')
//                ->subject("Money Transfer Failed")
//                ->html("Hi, Your money transfer failed");
//        });
    }
}
