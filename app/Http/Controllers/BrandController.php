<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\SearchHistory;
use App\Services\BrandSupplierMatcherService;

class BrandController extends Controller
{
    protected $brandSupplierMatcherService;

    public function __construct(BrandSupplierMatcherService $brandSupplierMatcherService)
    {
        $this->brandSupplierMatcherService = $brandSupplierMatcherService;
    }

    public function showMatches($brandId)
    {
        $brand = Brand::findOrFail($brandId);

        $suppliers = $this->brandSupplierMatcherService->matchSuppliersToBrand($brand);

        return view('matches', compact('suppliers'));
    }

    public function showSearchHistory($brandId)
    {
        $brand = Brand::findOrFail($brandId);
        $searchHistories = SearchHistory::where('brand_id', $brandId)
                                        ->orderBy('created_at', 'desc')
                                        ->get();

        return view('search', [
            'brand' => $brand,
            'searchHistories' => $searchHistories,
        ]);
    }
}
