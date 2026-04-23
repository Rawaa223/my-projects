<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTable extends Model
{
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
        'date',
        'time',
        'guest_number',
        'message',
    ];
}
