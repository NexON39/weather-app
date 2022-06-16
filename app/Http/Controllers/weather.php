<?php

namespace App\Http\Controllers;

use App\Interfaces\WeatherApiInterface;
use App\API\WeatherDataApi;
use Illuminate\Http\Request;

class Weather extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getWeather(Request $request)
    {
        if (!$request->isMethod('POST')) {
            return redirect()->route('indexRoute');
        }

        if (!$request->filled('cityName')) {
            return view('index', [
                'alert' => 'The field must be filled'
            ]);
        }

        $inputData = $request->input('cityName');
        $weatherData = new WeatherDataApi;

        $location = $weatherData->getLocation($inputData);
        if ($location['status'] == 401) {
            return view('index', [
                'alert' => $location['content']
            ]);
        }

        $data = $weatherData->getWeatherData($location['lat'], $location['lon']);
        if ($data['status'] == 401) {
            return view('index', [
                'alert' => $data['content']
            ]);
        }

        return view('index', [
            'status' => 200,
            'name' => $data['content']['name'],
            'state' => $location['state'],
            'lon' => $data['content']['coord']['lon'],
            'lat' => $data['content']['coord']['lat'],
            'weather' => $data['content']['weather'][0]['main'],
            'description' => $data['content']['weather'][0]['description'],
            'icon' => $data['content']['weather'][0]['icon'],
            'temp' => $data['content']['main']['temp'],
            'feels_like' => $data['content']['main']['feels_like'],
            'temp_min' => $data['content']['main']['temp_min'],
            'temp_max' => $data['content']['main']['temp_max'],
            'pressure' => $data['content']['main']['pressure'],
            'humidity' => $data['content']['main']['humidity'],
            'cloudy' => $data['content']['clouds']['all'],
            'speed' => $data['content']['wind']['speed'],
            'deg' => $data['content']['wind']['deg']
        ]);
    }
}
