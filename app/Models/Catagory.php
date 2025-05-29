<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catagory extends Model
{
    //

    use HasFactory;

    protected $fillable =[

        'catagory_name',
        
    ];

    public function setCatagoryNameAttribute($value){
        $this->attributes['catagory_name'] = ucfirst($value);
    }

}
