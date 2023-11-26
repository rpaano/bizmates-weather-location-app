<?php

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Http;

class ThirdPartyApi extends Controller
{
    protected string $baseUrl;
    protected string $versionUrl;
    protected array $urlParams;
    protected PendingRequest $http;

    public function __construct(Http $http)
    {
        $this->http = $http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);
    }

    public function header(string $name, string|int $value) : self
    {
        $this->http->withHeaders([
            $name => $value,
        ]);

        return $this;
    }

    public function cookieAuth(string|int $value) : self 
    {
        $this->http->withHeaders([
            'Cookie' => "oauth_token={$value}",
        ]);

        return $this;
    }

    public function baseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function versionUrl(string $versionUrl): self
    {
        $this->versionUrl = $versionUrl;

        return $this;
    }

    public function urlParams(array $params): self
    {
        $this->http->withQueryParameters($params);

        return $this;
    }

    public function send(string $method, string $path = ''): Response
    {
        $urlFull = "$this->baseUrl/$this->versionUrl/$path";
        

        return $this->http->{$method}($urlFull);
    }
}

    