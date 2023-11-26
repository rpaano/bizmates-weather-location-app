<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherCoordinateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //  $this->dt Does not work sadly
        return [
            'date' => $this->resource['dt_txt'],
            'main' => $this->resource['weather'][0]['main'],
            'temp' => $this->resource['main']['temp'],
            'description' => \Str::ucfirst($this->resource['weather'][0]['description']),
            'icon' => $this->resource['weather'][0]['icon'],
            'humidity' => $this->resource['main']['humidity'],
            'pressure' => $this->resource['main']['pressure'],
        ];
    }
}
