<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImport extends Model
{
    protected $table = 'product_imports';

    protected $fillable = [
    	'name', 'imported'
    ];
}
