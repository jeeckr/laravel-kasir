<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function get_all_product()
    {
        $products = Product::all();

        return response([
            'success' => true,
            'message' => 'List Produk',
            'data' => $products
        ], 200);
    }

    public function get_food_product()
    {
        $products = Product::where('category_id', 1)->get();

        return response([
            'success' => true,
            'message' => 'List Produk',
            'data' => $products
        ], 200);
    }

    public function get_drink_product()
    {
        $products = Product::where('category_id', 2)->get();

        return response([
            'success' => true,
            'message' => 'List Produk',
            'data' => $products
        ], 200);
    }
}
