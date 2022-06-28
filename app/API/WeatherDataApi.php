<?php

namespace App\API;

use App\API\GeoCodingApi;
use App\Interfaces\WeatherApiInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class WeatherDataApi extends GeoCodingApi implements WeatherApiInterface
{
    private $weatherApi;
    private $lat;
    private $lon;

    public function setLat($lat): void
    {
        $this->lat = $lat;
    }

    public function setLon($lon): void
    {
        $this->lon = $lon;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLon()
    {
        return $this->lon;
    }

    public function setWeatherApi()
    {
        $this->weatherApi = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $this->lat . '&lon=' . $this->lon . '&appid=cf9a50cb798c2914bb92d489e83352ec&units=metric';
    }

    public function getWeatherApi()
    {
        return $this->weatherApi;
    }

    public function getWeatherData($lat, $lon)
    {
        $this->setLat($lat);
        $this->setLon($lon);
        $this->setWeatherApi();

        try {
            $response = Http::get($this->getWeatherApi());
            $content = $response->json();
            return [
                'status' => 200,
                'content' => $content
            ];
        } catch (Exception $e) {
            return [
                'status' => 401,
                // 'content' => 'No result' . '(' . $e->getMessage() . ')'
                'content' => 'No result'
            ];
        }
    }
}
