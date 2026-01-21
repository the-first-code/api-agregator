<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\WeatherController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/auth')->group(function () {
    Route::post('/register', [ AuthController::class, 'register' ]);
    Route::post('/token', [ AuthController::class, 'newToken' ]);
});

Route::prefix('/weather')->group(function () {
    Route::get('/city/{city}', [ WeatherController::class, 'getByCity' ]);
    Route::get('/coordinates/{latitude}/{longitude}', [ WeatherController::class, 'getByCoordinates' ]);
})->middleware('auth:sanctum');

Route:: get('status', [ StatusController::class, 'index' ]);
