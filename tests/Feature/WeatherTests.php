<?php

namespace Tests\Feature;

use App\API\GeoCodingApi;
use App\API\WeatherDataApi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherTests extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCitySetter()
    {
        $geoApi = new GeoCodingApi;
        $geoApi->setSearchedCity('London');
        $this->assertSame('London', $geoApi->getSearchedCity());
    }

    public function testGeoApiSetter()
    {
        $geoApi = new GeoCodingApi;
        $geoApi->setSearchedCity('London');
        $geoApi->setGeoApi();
        $this->assertSame('http://api.openweathermap.org/geo/1.0/direct?q=London&limit=1&appid=cf9a50cb798c2914bb92d489e83352ec', $geoApi->getGeoApi());
    }

    public function testLocationLatSetter()
    {
        $weatherApi = new WeatherDataApi;
        $weatherApi->setLat(50);
        $this->assertSame(50, $weatherApi->getLat());
    }
    public function testLocationLonSetter()
    {
        $weatherApi = new WeatherDataApi;
        $weatherApi->setLon(12);
        $this->assertSame(12, $weatherApi->getLon());
    }
    public function testWeatherApiSetter()
    {
        $weatherApi = new WeatherDataApi;
        $weatherApi->setLat(50);
        $weatherApi->setLon(12);
        $weatherApi->setWeatherApi();
        $this->assertSame('https://api.openweathermap.org/data/2.5/weather?lat=50&lon=12&appid=cf9a50cb798c2914bb92d489e83352ec&units=metric', $weatherApi->getWeatherApi());
    }

    public function testGeoCodingApi()
    {
        $geoApi = new GeoCodingApi;
        $result = $geoApi->getLocation('London');
        $this->assertSame(200, $result['status']);
    }

    public function testWeatherDataApi()
    {
        $weatherApi = new WeatherDataApi;
        $result = $weatherApi->getWeatherData(-0.1278, 51.5074);
        $this->assertSame(200, $result['status']);
    }
}
