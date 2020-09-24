<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employee = Auth::guard('employee')->user();
        $products = Product::all();

        // session()->forget('cart');

        return view('kasir.component.main', compact('employee', 'products',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->id);

        $cart = session()->has('cart') ? session()->get('cart') : [];

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['total_qty']++;
            $cart[$product->id]['total_price'] = $product->price * $cart[$product->id]['total_qty'];
            // $cart[$product->id]['total_all'] = $cart[$product->id]['total_all'] + $cart[$product->id]['total_price'];
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'total_qty' => 1,
                'total_price' => $product->price,
                // 'total_all' => $product->price,
            ];
        }

        session(['cart' => $cart]);

        $checkout = view('kasir.component.list_checkout')->render();

        return response()->json(["message" => "success", 'html' => $checkout]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $products = Product::where('name', 'LIKE', '%' . $request->search . "%")->get();

            if ($products) {
                foreach ($products as $key => $product) {
                    $output = $product->name;
                }
                return response($output);
            } else {
                $output = "Produk tidak ditemukan";
            }
        }
    }
}
