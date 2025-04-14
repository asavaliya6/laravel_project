<?php

namespace App\Repositories;

use App\Models\Product;
use Carbon\Carbon;

class ProductRepository
{

    public static function addSubscriptionDays(Product $product, $days)
    {
        $currentEndDate = $product->subscription_end_date
            ? Carbon::parse($product->subscription_end_date)
            : Carbon::now();

        $product->subscription_end_date = $currentEndDate->addDays($days);
        $product->save();
    }
    
}
