<?php

namespace Database\Seeders;

use App\Models\Command;
use Illuminate\Database\Seeder;

class CommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Command::query()->create([
            'controlByUser' => 'non',
            'decisionTreeResult' => 'non',
            'pumpMustBe' => 'non',
        ]);
    }
}
