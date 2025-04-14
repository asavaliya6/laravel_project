<?php

namespace App\Helpers;

use App\Models\Product;
use Carbon\Carbon;

class ProductHelper
{
    public static function extendSubscription(Product $product, int $days = 15)
    {
        $currentEndDate = $product->subscription_end_date 
            ? Carbon::parse($product->subscription_end_date) 
            : Carbon::now();

        $product->subscription_end_date = $currentEndDate->addDays($days);
        $product->save();

        return $product;
    }
}
