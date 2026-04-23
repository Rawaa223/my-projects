<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'food_name',
        'food_details',
        'food_image',
        'food_price',
        'food_type',
    ];
}
