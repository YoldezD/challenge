<?php

namespace App\Http\Controllers;
use App\Events\SupplierProductAdded;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductForm()
    {
        return view('product');
    }

  
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            
        ]);
    
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->supplier_id = 1;
        
        $product->save();
        $supplierId=1;
        // Trigger event
        event(new SupplierProductAdded($supplierId, $product));

        return response()->json(['product' => $product]);
    }
}
