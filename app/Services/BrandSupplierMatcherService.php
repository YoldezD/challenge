<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;

class BrandSupplierMatcherService
{
    public function matchSuppliersToBrand(Brand $brand)
    {

        $products = Product::where('category_id', $brand->category_id)->get();
        $supplierIds = $products->pluck('supplier_id')->unique();
        $suppliers = Supplier::whereIn('id', $supplierIds)->get();

        return $suppliers;
    }
}
