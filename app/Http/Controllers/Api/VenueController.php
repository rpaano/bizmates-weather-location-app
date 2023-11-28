<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VenueRequest;
use App\Http\Resources\VenueResource;
use Illuminate\Http\Request;
use App\Http\Services\FourSquareApi;

class VenueController extends Controller
{

    public function __construct(protected FourSquareApi $fourSquareApi)
    {
        $this->fourSquareApi = $fourSquareApi;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(VenueRequest $request)
    {
        $response = $this->fourSquareApi
            ->near($request->near)
            ->category($request->category_id)
            ->limit($request->limit)
            ->send('get', 'venues/search');
        
        return VenueResource::collection(collect($response->json()['response']['venues']));
    }
}
