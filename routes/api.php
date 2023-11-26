<?php

use App\Http\Controllers\Api\VenueCategoryController;
use App\Http\Controllers\Api\VenueController;
use App\Http\Controllers\Api\WeatherCoordinateController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('venues', VenueController::class);

Route::get('venue-categories', VenueCategoryController::class);

Route::get('weather-coordinate', WeatherCoordinateController::class);