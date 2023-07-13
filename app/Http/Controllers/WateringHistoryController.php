<?php

namespace App\Http\Controllers;

use App\Http\Resources\WateringHistoryResource\WateringHistoryResource;
use App\Models\WateringHistory;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class WateringHistoryController extends Controller
{
    public function index(): JsonResponse
    {
        return self::successResponse(200, WateringHistoryResource::collection(WateringHistory::all()));
    }

    public function storeHistory(): void
    {
        if ((WateringHistory::all()->last()->date) != (Carbon::now()->toDateString())) {
            WateringHistory::query()->create([
                'date' => Carbon::now()->toDateString(),
            ]);
        }
    }
}
