<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'qty', 'total_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }
}
