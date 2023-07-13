<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\DecisionTreeController;
use App\Http\Controllers\SoilConditionController;
use App\Http\Controllers\WateringCycleController;
use App\Http\Controllers\WateringHistoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/commands', [CommandController::class, 'commandsToHardware']);
Route::post('/commands', [CommandController::class, 'commandsFromMobile']);
Route::get('/decisionTreeResult', [CommandController::class, 'decisionTreeResult']);

Route::post('/soilCondition', [SoilConditionController::class, 'soilConditionFromHardware']);
Route::get('/soilCondition', [SoilConditionController::class, 'soilConditionToMobile']);

Route::get('/wateringHistory', [WateringHistoryController::class, 'index']);

Route::post('/wateringCycle', [WateringCycleController::class, 'store']);

Route::get('/superData', [DecisionTreeController::class, 'index']);



