<?php

namespace App\Http\Controllers;

use App\Http\Resources\SoilConditionResource\SoilConditionResource;
use App\Models\SoilCondition;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SoilConditionController extends Controller
{
    public function soilConditionFromHardware(Request $request): JsonResponse
    {
        SoilCondition::query()->update([
            'temperature' => $request->temperature,
            'moisture' => $request->moisture,
        ]);
        (new DecisionTreeController())->storeSoilCondition();
        return self::successResponse(201, 'The data was inserted.');
    }

    public function soilConditionToMobile(): JsonResponse
    {
        $dataResponse = SoilCondition::query()->first();
        return self::successResponse(200, new SoilConditionResource($dataResponse));
    }
}
