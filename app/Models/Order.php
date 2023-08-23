<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shipping_phoneNo',
        'shipping_city',
        'shipping_address',
        'product_name',
        // 'quantity',
        'total_price',  
    ];


public function user(){
    return $this->belongsTo(User::class );
}

    public function orderdetails()
    {
    return $this->hasMany(OrderDetail::class);
    }
   
}
