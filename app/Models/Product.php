<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
   
    use HasFactory;

    protected $fillable = [

        'title',
        'description',
        'image',
        'price',
        'catagory',
        'quantity',

    ];

    public function setTitleAttribute($value){

        $this->attributes['title'] = ucfirst($value);

    }

    public function setDescriptionAttribute($value){

        $this->attributes['description'] = ucfirst($value);

    }

    public function setCatagoryAttribute($value){

        $this->attributes['catagory'] = ucfirst($value);

    }

    public function getTitleAttribute($value){

        return ucfirst($value);

    }

    public function Sluggable():array{

        return[

            'Slug'=>[

                'source'=> 'title',

            ]

        ];

    }

}
