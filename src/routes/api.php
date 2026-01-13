<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StatusController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('auth/register', [ AuthController::class, 'register' ]);

Route::post('auth/token', [ AuthController::class, 'newToken' ]);

Route:: get('status', [ StatusController::class, 'index' ]);
