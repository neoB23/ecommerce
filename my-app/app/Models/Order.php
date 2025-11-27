<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'total',
        'status',
        'delivered_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}