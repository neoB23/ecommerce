<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    use HasFactory;

     protected $fillable = [
        'seller_id',
        'title',
        'category',
        'description',
        'price',
        'stock',
        'image',
        'rating',
    ];
    
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
    public function toArray()
{
    $array = parent::toArray();
    unset($array['image']); // remove binary from JSON
    return $array;
}
}
