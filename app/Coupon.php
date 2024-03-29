<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'name', 
        'code',
        'percentage',
        'status'
    ];
}
