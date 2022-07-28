<?php

namespace App\Jobs;

use App\Mail\AdvertiserReminderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AvertiserMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $advertisers;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($advertisers)
    {
        $this->advertisers = $advertisers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->advertisers as $advertiser)
        {
            if (!empty($advertiser->email))
            {
                Mail::to($advertiser->email)->send(new AdvertiserReminderMail());
            }
        }
    }
}
