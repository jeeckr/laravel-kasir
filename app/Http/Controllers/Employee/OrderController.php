<?php

namespace App\Http\Controllers\Employee;

use App\DetailOrder;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = new Order;

        $date = date("Ymd");
        $time = time();
        // $now->toDateTimeString();
        // $result = preg_replace("/[^0-9]/", "", $now);
        // dd($time);

        $order->invoice = $time;
        $order->employee_id = $request['id_employee'];
        $order->total = $request['total'];

        $order->save();

        foreach ($request->id_product as $key => $value) {
            DetailOrder::create([
                'order_id' => $order->invoice,
                'product_id' => $request->id_product[$key],
                'qty' => $request->total_qty[$key],
                'total_price' => $request->total_price[$key],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('dashboard_employee');
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
}
