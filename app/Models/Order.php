<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    
    use HasFactory;

    public function User(){

        return $this->hasOne('App\Models\User','id','user_id');

    }

    public function Product(){

        return $this->hasOne('App\Models\Product','id','product_id');

    }

}
