<?php

namespace App\Console\Commands;

use App\Jobs\AvertiserMailJob;
use App\Models\Ad;
use App\Models\Advertiser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AdvertiserReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertiser:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'a daily email at 08:00 PM that will be sent to advertisers who have ads the next day as a remainder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Advertiser::query()->whereHas("ads", function ($q){
          $q->whereDate("start_date" , Carbon::now()->addDay());
        })->chunk(10 , function ($advertiser){
            dispatch(new AvertiserMailJob($advertiser));
        });
        $this->info("Done");
    }
}
