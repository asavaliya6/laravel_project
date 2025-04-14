<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'subscription_end_date'
    ];

    protected $casts = [
        'subscription_end_date' => 'date',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function addSubscriptionDays($days)
    {
        $currentEndDate = $this->subscription_end_date 
            ? Carbon::parse($this->subscription_end_date) 
            : Carbon::now();

        $this->subscription_end_date = $currentEndDate->addDays($days);
        $this->save();
    }
}
