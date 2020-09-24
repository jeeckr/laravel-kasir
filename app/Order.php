<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'invoice', 'total', 'employee_id',
    ];

    // public function detail_order()
    // {
    //     return $this->belongsTo(DetailOrder::class);
    // }
}
