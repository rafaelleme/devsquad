<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'subName', 'price', 'description'
    ];

    public function tags()
    {
        return $this->hasMany('App\ProductTag');
    }

    public function images()
    {
    	return $this->hasMany('App\ProductImage');
    }
}


