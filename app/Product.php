<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'cat_id', 
        'name',
        'price',
        'vat'
    ];
}
