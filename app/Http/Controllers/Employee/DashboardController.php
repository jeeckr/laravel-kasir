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

        if (!session()->has('total')) {
            session()->put('total', 0);
        }

        // session()->forget('cart');
        // session()->forget('total');


        return view('kasir.component.main', compact('employee', 'products',));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->id);
        $cart = session()->has('cart') ? session()->get('cart') : [];

        if (!array_key_exists($product->id, $cart)) {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'total_qty' => 1,
                'total_price' => $product->price,
            ];
        }

        session(['cart' => $cart]);

        $total = 0;
        if (Session::has('cart')) {
            foreach (Session::get('cart') as $data) {
                $total += $data['total_price'];
                session(['total' => $total]);
            }
        }

        $checkout = view('kasir.component.list_checkout')->render();
        $total_checkout = view('kasir.component.total_checkout')->render();

        return response()->json(['success' => true, 'html' => $checkout, 'total' => $total_checkout]);
    }

    public function add_qty(Request $request)
    {
        $product = Product::find($request->id);

        $cart = Session::get('cart');

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['total_qty']++;
            $cart[$product->id]['total_price'] = $product->price * $cart[$product->id]['total_qty'];

            session(['cart' => $cart]);

            $total = 0;
            if (Session::has('cart')) {
                foreach (Session::get('cart') as $data) {
                    $total += $data['total_price'];
                    session(['total' => $total]);
                }
            }
        }

        $checkout = view('kasir.component.list_checkout')->render();
        $total_checkout = view('kasir.component.total_checkout')->render();

        return response()->json(['success' => true, 'html' => $checkout, 'total' => $total_checkout]);
    }

    public function min_qty(Request $request)
    {
        $product = Product::find($request->id);

        $cart = Session::get('cart');

        if (array_key_exists($product->id, $cart)) {
            if ($cart[$product->id]['total_qty'] > 1) {
                $cart[$product->id]['total_qty']--;
                $cart[$product->id]['total_price'] = $product->price * $cart[$product->id]['total_qty'];

                session(['cart' => $cart]);

                $total = 0;
                if (Session::has('cart')) {
                    foreach (Session::get('cart') as $data) {
                        $total += $data['total_price'];
                        session(['total' => $total]);
                    }
                }
            }
        }


        $checkout = view('kasir.component.list_checkout')->render();
        $total_checkout = view('kasir.component.total_checkout')->render();

        return response()->json(['success' => true, 'html' => $checkout, 'total' => $total_checkout]);
    }

    public function delete_item(Request $request)
    {
        $product = Product::find($request->id);

        Session::forget('cart.' . $product->id);

        $checkout = view('kasir.component.list_checkout')->render();

        $total_checkout = view('kasir.component.total_checkout')->render();

        return response()->json(['success' => true, 'html' => $checkout, 'total' => $total_checkout]);
    }

    public function get_item(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $products = Product::orderby('name', 'asc')
                ->get();
        } else {
            $products = Product::orderby('name', 'asc')
                ->where('name', 'like', '%' . $search . '%')
                ->get();
        }

        $response = '';
        foreach ($products as $data) {
            $response .= view('kasir.component.item_product', ['data' => $data])->render();
        }

        return $response;
    }
}
