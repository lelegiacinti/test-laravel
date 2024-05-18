<?php

namespace App\Http\Controllers;

use App\Services\BreweryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(private readonly BreweryService $breweryService)
    {
    }

    public function index(): RedirectResponse
    {
        return redirect()->route('dashboard');
    }

    public function render(Request $request): View
    {
        $breweries = $this->breweryService->getPaginatedBreweryList($request);
        $metadata = $this->breweryService->getMetadataBreweryList();

        $lastPage = ceil(intval($metadata['total']) / intval($metadata['per_page']));
        $currentPage = intval($request->get('page', 1));
        $previousPage = $currentPage >= 4 ? $currentPage - 4 : null;

        return view('dashboard', [
            'breweries' => $breweries,
            'pages' => $lastPage,
            'currentPage' => $currentPage,
            'previousPage' => $previousPage
        ]);
    }
}
