<?php

namespace App\Interfaces;

interface WeatherApiInterface
{
    public function getWeatherData($lat, $lon);
}
