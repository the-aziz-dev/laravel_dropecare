<?php

namespace Database\Seeders;

use App\Models\DecisionTree;
use Illuminate\Database\Seeder;

class DecisionTreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DecisionTree::factory()->count(40)->create();
    }
}
