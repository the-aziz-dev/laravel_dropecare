<?php

namespace App\Http\Controllers;

use App\Models\WateringCycle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WateringCycleController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        WateringCycle::query()->update([
            'cycle' => $request->cycle
        ]);
        return self::successResponse(201, 'The data was inserted.');
    }
}
