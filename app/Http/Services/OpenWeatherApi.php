<?php
 
namespace App\Http\Services;
 
use Http;
 
class OpenWeatherApi extends ThirdPartyApi
{
    public function __construct(Http $http) 
    {
        parent::__construct($http);

        $this->baseUrl = \config('services.openweather_api.url');
        $this->versionUrl = \config('services.openweather_api.version_url');
        $this->appId(\config('services.openweather_api.app_id'));
        $this->units(\config('services.openweather_api.units'));
        $this->cntLimit(\config('services.openweather_api.cnt_limit'));
    }

    public function appId(string $value): self
    {
        $this->http->withQueryParameters(['appId' => $value]);

        return $this;
    }

    public function coordinates(int|float|string $lat, int|float|string $lon): self
    {
        $this->http->withQueryParameters([
            'lat' => $lat,
            'lon' => $lon
        ]);

        return $this;
    }

    public function cntLimit(int $value): self
    {
        $this->http->withQueryParameters(['cnt' => $value]);

        return $this;
    }

    public function units(string $value): self
    {
        $this->http->withQueryParameters(['units' => $value]);

        return $this;
    }
}