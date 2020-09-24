<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $admin = $this->admin();
    }

    public function admin()
    {
        return Auth::guard('admin')->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        // $makanan = Category::all();
        $admin = Auth::guard('admin')->user();
        $food = Product::where('category_id', 1)->get();
        $drink = Product::where('category_id', 2)->get();

        return view('admin.product.product_index', compact('product', 'admin', 'food', 'drink'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = $this->admin();
        return view('admin.product.product_create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        $path = null;

        if ($request->has('image')) {
            $path = $request->file('image')->store('images');
        }

        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $path,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product_admin')->with('success', 'Data produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $admin = $this->admin();
        return view('admin.product.product_detail', compact('product', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $admin = $this->admin();
        return view('admin.product.product_edit', compact('product', 'admin'));
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
        $product = $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        Product::where('id', $id)->update($product);

        return redirect()->route('product_admin')->with('success', 'Data produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('product_admin')->with('success', 'Data produk berhasil dihapus!');
    }
}
