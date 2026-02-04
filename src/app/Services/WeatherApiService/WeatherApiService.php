<?php

namespace App\Services;

use App\Models\ApiProvider;

class WeatherApiService
{
    public function getWeatherByCity ($city, $options = [])
    {
        $provider = new ApiProvider();
        $base_uri = $provider->latest()->first()->base_url;

        $url = $this->buildUrl();

        $ch = curl_init($base_uri . '?city=' . $city); // Инициализация сеанса (параметры приведены как пример - зависят от конкретного API_провайдера)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Возвращать результат как строку
        $weather = curl_exec($ch); // Выполнение запроса
        curl_close($ch); // Закрытие сеанса

        return response()->json($weather);
    }

    public function getWeatherByCoordinates ($latitude, $longitude, $options = [])
    {
        $provider = new ApiProvider();
        $base_uri = $provider->latest()->first()->base_url;

        $ch = curl_init($base_uri . '?latitude=' . $latitude . '&longitude=' . $longitude); // Инициализация сеанса (параметры приведены как пример - зависят от конкретного API_провайдера)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Возвращать результат как строку
        $weather = curl_exec($ch); // Выполнение запроса
        curl_close($ch); // Закрытие сеанса

        return response()->json($weather);
    }
}

private function buildUrl($params)
{
    $domainUrl = rtrim($base_uri, '/');
    $params = ltrim($params, '/');

    return $domainUrl . "/" . $params;
}
