<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 
        'item_ammount',
        'code_used',
        'total',
        'tax'
    ];
}
