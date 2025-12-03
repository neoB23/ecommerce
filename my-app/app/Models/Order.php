<?php

// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    public function items() {
    return $this->hasMany(OrderItem::class);
}
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'price',
        'total',
        'status',
        'delivered_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
