<?php

namespace Database\Factories;

use App\Models\DecisionTree;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DecisionTree>
 */
class DecisionTreeFactory extends Factory
{
    /**
     * Define the model's default state.
     *o
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => Carbon::now()->toDateTimeString(),
            'forecast' => 'non',
            'hasWater' => 'no',
            'moisture' => 0,
            'temperature' => 0,
            'decisionTreeResult' => 'non',
        ];
    }
}

