<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
    ];
    protected function subtotal(): Attribute
{
    return Attribute::make(
        get: fn (mixed $value, array $attributes) => 
            $attributes['price']*$attributes['quantity'],
        
    );
}

}
