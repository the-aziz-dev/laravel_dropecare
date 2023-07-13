<?php

namespace App\Http\Controllers;

use App\Models\DecisionTree;
use App\Models\SoilCondition;
use App\Models\WateringCycle;
use App\Models\WateringHistory;
use App\Utils\APIGrabber;
use App\Utils\DecisionTree\DecisionTreeBrain;
use App\Utils\TimeManager;
use Carbon\Carbon;

class DecisionTreeController extends Controller
{
    public static function storeWeatherData(): void
    {
        $apiGrabber = new APIGrabber();
        $data = $apiGrabber->fetchAPI();

        if (DecisionTree::all()->last()->forecast == 'non') {
            $count = 0;
            foreach ($data['list'] as $weather) {
                $count++;
                DecisionTree::query()->where('id', $count)->update([
                    'date' => $weather['dt_txt'],
                    'forecast' => $weather['weather'][0]['description'],
                ]);
            }
        } else {
            $lastDateValue = $data['list'][39]['dt_txt'];
            $lastForecastValue = $data['list'][39]['weather'][0]['description'];

            if ((DecisionTree::all()->last())->date != $lastDateValue)
                DecisionTree::query()->insert([
                    'date' => $lastDateValue,
                    'forecast' => $lastForecastValue,
                    'temperature' => 0,
                    'moisture' => 0,
                    'decisionTreeResult' => 'non',
                ]);
        }
    }

    public function storeSoilCondition(): void
    {
        $soilCondition = SoilCondition::query()->first();
        DecisionTree::query()->where('date', $this->castedDateTime())->update([
            'temperature' => $soilCondition->temperature,
            'moisture' => $soilCondition->moisture,
        ]);
        $this->storeHasWater();
        $this->callDecisionTreeBrain();
    }


    public function storeHasWater(): void
    {
        $query = DecisionTree::query()->where('date', $this->castedDateTime());
        $cycle = WateringCycle::query()->first()->cycle;
        $currentDate = Carbon::now();
        $savedDay = Carbon::parse(WateringHistory::all()->last()->date);

        $numberOfDays = $currentDate->diffInDays($savedDay);

        if ($numberOfDays >= $cycle) {
            $query->update(['hasWater' => 'no']);
        } else {
            $query->update(['hasWater' => 'yes']);
        }
    }

    public function castedDateTime(): string
    {
        $timeManager = new TimeManager(Carbon::now());
        return $timeManager->timeChanger();
    }

    public function callDecisionTreeBrain(): void
    {
        $data = DecisionTree::query()->where('date', $this->castedDateTime())->first();
        DecisionTreeBrain::execute($data);
        (new CommandController())->storeDTCommand($data->decisionTreeResult);
    }

}

