<?php

namespace App\Http\Controllers;

use App\Services\BreweryService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function render(): View
    {
        $breweries = $this->getPaginatedBreweryList();

        return view('dashboard', [
            'breweries' => $breweries
        ]);
    }

    public function getPaginatedBreweryList(): array | string
    {
        try {
            $response = Http::get('https://api.openbrewerydb.org/v1/breweries');

            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
        }

        return "No breweries found";
    }
}
