<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

        protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'total_amount',
        'status',
    ];

    public function product()
{
    return $this->belongsTo(Product::class);
}

    // Optional: if you want to fetch cart products later
    // public function products() { ... }
}
