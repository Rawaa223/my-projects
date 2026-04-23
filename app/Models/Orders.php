<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_email',
        'customer_Address',
        'customer_phone',
        'Food_name',
        'Food_type',
        'Food_image',
        'Food_price',
        'Food_quantity',
        'order_status',
    ];
}
