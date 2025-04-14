<?php

use App\Models\Product;

if (! function_exists('extend_product_subscription')) {
    
    function extend_product_subscription($productId, $days)
    {
        $product = Product::find($productId);
        if ($product) {
            $product->addSubscriptionDays($days);
            return true;
        }

        return false;
    }
}
