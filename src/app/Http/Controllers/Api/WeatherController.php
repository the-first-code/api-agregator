<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WeatherApiService;
use App\Http\Requests\CoordinatesRequest;

class WeatherController extends Controller
{
    public function getByCity (CoordinatesRequest $corRequest, Request $request, $city)
    {
        $city = $corRequest->validated(['city']);
        try {
            $weather = WeatherApiService::getWeatherByCity($city, []);

            return $weather;
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function getByCoordinates (CoordinatesRequest $corRequest, Request $request, $latitude, $longitude)
    {
        $latitude = $corRequest->validated(['latitude']);
        $longitude = $corRequest->validated(['longitude']);

        try {
            $weather = WeatherApiService::getWeatherByCoordinates($latitude, $longitude, []);

            return $weather;
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
}
