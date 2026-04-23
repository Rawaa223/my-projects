<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCart extends Model
{
    protected $fillable = [
        'userID',
        'food_id',
        'food_name',
        'food_details',
        'food_image',
        'food_quantity',
        'food_price',
        'food_type',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
