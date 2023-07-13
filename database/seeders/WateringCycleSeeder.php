<?php

namespace Database\Seeders;

use App\Models\WateringCycle;
use Illuminate\Database\Seeder;

class WateringCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WateringCycle::query()->create([
            'cycle' => 3,
        ]);
    }
}
