<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BreweryService
{
    public function getPaginatedBreweryList(Request $request): ?array
    {
        try {
            if (null !== $request->getQueryString()){
                $response = Http::get(config('app.breweries_url') . '?' . $request->getQueryString());
            } else {
                $response = Http::get(config('app.breweries_url'));
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
        }

        return null;
    }

    public function getMetadataBreweryList(): ?array
    {
        try {
            $response = Http::get(config('app.breweries_url') . '/meta');

            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
        }

        return null;
    }
}
