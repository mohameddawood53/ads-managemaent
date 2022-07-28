<?php

namespace Database\Seeders;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ad::create([
            "title" => fake()->name(),
            "description" => fake()->name(),
            "type" => "free",
            "start_date" => Carbon::now()->addDays(1),
            "advertiser_id" => 1,
            "category_id" => 1
        ]);
    }
}
