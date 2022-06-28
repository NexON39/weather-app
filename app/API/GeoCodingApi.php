<?php

namespace App\API;

use Exception;
use Illuminate\Support\Facades\Http;

class GeoCodingApi
{
    protected string $searchedCity;
    protected string $geoApi;

    public function setSearchedCity($searchedCity): void
    {
        $this->searchedCity = $searchedCity;
    }

    public function getSearchedCity()
    {
        return $this->searchedCity;
    }

    public function setGeoApi(): void
    {
        $this->geoApi = 'http://api.openweathermap.org/geo/1.0/direct?q=' . $this->searchedCity . '&limit=1&appid=cf9a50cb798c2914bb92d489e83352ec';
    }

    public function getGeoApi()
    {
        return $this->geoApi;
    }

    public function getLocation($city)
    {
        $this->setSearchedCity($city);
        $this->setGeoApi();

        try {
            $response = Http::get($this->getGeoApi());
            $content = $response->json();
            return [
                'status' => 200,
                'lat' => $content[0]['lat'],
                'lon' => $content[0]['lon'],
                'state' => $content[0]['state']
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
