<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DecisionTreeSeeder::class);
        $this->call(SoilConditionSeeder::class);
        $this->call(WateringHistorySeeder::class);
        $this->call(CommandSeeder::class);
        $this->call(WateringCycleSeeder::class);
    }
}
