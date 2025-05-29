<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    
    protected $fillable = [

        't_id',
        'amount',
        'order_id',
        'product_id',
        'user_id',
        'user_name',
        'status'

    ];

}
