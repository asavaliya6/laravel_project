<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function setProduct()
    {
        $product = Product::create([
            'name' => 'SAMPLE PRODUCT 9',
            'price' => 12,
            'description' => 'Sample product created'
        ]);

        return view('product.success', [
            'message' => 'Product created successfully!',
            'product' => $product
        ]);
    }

    public function getProducts()
    {
        $products = Product::all();

        return view('product.list', compact('products'));
    }

}
