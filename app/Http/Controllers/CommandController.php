<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommandResource\HardwareCommandResource;
use App\Http\Resources\CommandResource\MobileCommandResource;
use App\Models\Command;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function commandsFromMobile(Request $request): JsonResponse
    {
        Command::query()->update([
            'controlByUser' => $request->controlByUser,
        ]);
        $this->storePumpMustBe();
        return self::successResponse(201, 'The data was inserted.');
    }

    public function commandsToHardware(): JsonResponse
    {
        $dataResponse = Command::query()->first();
        return self::successResponse(200, new HardwareCommandResource($dataResponse));
    }

    public function decisionTreeResult(): JsonResponse
    {
        $dataResponse = Command::query()->first();
        return self::successResponse(200, new MobileCommandResource($dataResponse));

    }

    public function storeDTCommand($decisionTreeResult): void
    {
        Command::query()->first()->update([
            'decisionTreeResult' => $decisionTreeResult
        ]);
        $this->storePumpMustBe();
    }

    public function storePumpMustBe(): void
    {
        $data = Command::query()->first();
        $pumpMustBe = ($data->controlByUser == 'dt' && $data->decisionTreeResult == 'yes')
        || $data->controlByUser == 'yes' ? 'on' : 'off';
        $data->update(['pumpMustBe' => $pumpMustBe]);
        (new WateringHistoryController())->storeHistory();
    }
}
