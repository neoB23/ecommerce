<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

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

    // Each order item belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Each order item belongs to a customer (user)
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}

