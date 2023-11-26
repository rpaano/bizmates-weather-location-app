<?php
 
namespace App\Http\Services;
 
use Http;
 
class FourSquareApi extends ThirdPartyApi
{
    public function __construct(Http $http) 
    {
        parent::__construct($http);

        $this->baseUrl = \config('services.foursquare_api.url');
        $this->versionUrl = \config('services.foursquare_api.version_url');
        $this->cookieAuth(\config('services.foursquare_api.oauth'));
        $this->v();
    }

    public function limit(int $value = null): self
    {
        $this->http->withQueryParameters(['limit' => $value]);

        return $this;
    }

    public function near(string $value = null): self
    {
        $this->http->withQueryParameters(['near' => $value]);

        return $this;
    }

    public function category(string $value = null): self
    {
        if ($value) {
            $this->http->withQueryParameters(['categoryId' => $value]);
        }

        return $this;
    }

    public function query(string $value): self
    {
        if ($value) {
            $this->http->withQueryParameters(['query' => $value]);
        }

        return $this;
    }

    public function v(string $value = null): self
    {
        $this->http->withQueryParameters(['v' => $value ?? now()->format('Ymd')]);

        return $this;
    }
}