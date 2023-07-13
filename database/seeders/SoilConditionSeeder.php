<?php

namespace Database\Seeders;

use App\Models\SoilCondition;
use Illuminate\Database\Seeder;

class SoilConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoilCondition::query()->create([
            'moisture' => 0,
            'temperature' => 0,
        ]);
    }
}
