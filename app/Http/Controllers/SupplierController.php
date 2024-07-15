<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getSuggestedSuppliers($category)
    {
       
        $suppliers = Supplier::whereHas('products', function ($query) use ($category) {
            $query->where('category_id', $category);
        })->get();

        return response()->json(['suppliers' => $suppliers]);
    }
}
