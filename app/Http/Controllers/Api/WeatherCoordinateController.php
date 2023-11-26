<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherCoordinateResource;
use Illuminate\Http\Request;
use App\Http\Services\OpenWeatherApi;
use Illuminate\Support\Collection;

class WeatherCoordinateController extends Controller
{
    public function __construct(protected OpenWeatherApi $openWeatherApi) {}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $responce = $this->openWeatherApi->coordinates($request->lat, $request->lon)
            ->send('get', 'forecast');

        return WeatherCoordinateResource::collection(collect(json_decode($responce->body(), true)['list']));
    }
}
