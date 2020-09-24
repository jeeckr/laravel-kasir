<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'name', 'stock', 'price', 'image', 'category_id'
    ];

    public function showImage()
    {
        if (Storage::has($this->image)) {
            return asset('storage/' . $this->image);
            // return asset('storage/' . $this->image);
        }
        return asset('images/defaultImage.png');
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function detail_order()
    {
        return $this->hasMany(DetailOrder::class);
    }
}
