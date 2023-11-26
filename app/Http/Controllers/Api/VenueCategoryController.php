<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\FourSquareApi;
use Illuminate\Http\Request;

class VenueCategoryController extends Controller
{

    public function __construct(protected FourSquareApi $fourSquareApi){}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $response = $this->fourSquareApi
            ->send('get', 'venues/categories');

        return collect($response->json());
    }
}
