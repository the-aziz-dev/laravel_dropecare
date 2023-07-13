<?php

namespace Database\Seeders;

use App\Models\WateringHistory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WateringHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WateringHistory::query()->create([
            'date' => Carbon::now()->toDateString(),
        ]);
    }
}
