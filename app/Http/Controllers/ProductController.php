<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

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

    public function extendProductSubscription($id)
    {
        $product = Product::findOrFail($id);

        // custom helper function
        // $product->addSubscriptionDays(15);

        // repository base helper function 
        $this->productRepository->addSubscriptionDays($product, 15);

        // class base helper funtion 
        // ProductHelper::extendSubscription($product, 15);

        return redirect()->route('list-product')->with('message', 'Subscription extended successfully!');
    }
}


