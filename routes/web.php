<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login_employee');
})->name('homepage');

Route::group(['prefix' => 'admin',  'middleware' => ['admin']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard_admin');

    Route::get('/product', 'Admin\ProductController@index')->name('product_admin');
    Route::get('/product/tambah', 'Admin\ProductController@create')->name('product_create');
    Route::post('/product/tambah', 'Admin\ProductController@store')->name('product_store');
    Route::get('/product/edit/{id}', 'Admin\ProductController@edit')->name('product_edit');
    Route::put('/product/edit/{id}', 'Admin\ProductController@update')->name('product_update');
    Route::get('/product/{id}', 'Admin\ProductController@destroy')->name('product_destroy');
    Route::get('/product/detail/{id}', 'Admin\ProductController@show')->name('product_show');

    Route::get('/employee', 'Admin\EmployeeController@index')->name('employee_admin');
    Route::get('/employee/tambah', 'Admin\EmployeeController@create')->name('employee_create');
    Route::post('/employee/tambah', 'Admin\EmployeeController@store')->name('employee_store');
    Route::get('/employee/edit/{id}', 'Admin\EmployeeController@edit')->name('employee_edit');
    Route::put('/employee/edit/{id}', 'Admin\EmployeeController@update')->name('employee_update');
    Route::get('/employee/{id}', 'Admin\EmployeeController@destroy')->name('employee_destroy');

    Route::get('/order', 'Admin\OrderController@index')->name('order_admin');
    Route::get('/order/detail/{id}', 'Admin\OrderController@show')->name('order_detail');
});

Route::group(['prefix' => 'kasir',  'middleware' => ['employee']], function () {
    Route::get('/employee/dashboard/', 'Employee\DashboardController@index')->name('dashboard_employee');
    Route::post('/employee/dashboard/', 'Employee\DashboardController@store')->name('store_employee');
    Route::post('/employee/dashboard/add_qty', 'Employee\DashboardController@add_qty')->name('add_qty');
    Route::post('/employee/dashboard/min_qty', 'Employee\DashboardController@min_qty')->name('min_qty');
    Route::post('/employee/dashboard/delete_item/', 'Employee\DashboardController@delete_item')->name('delete_item');
    // Route::post('/employee/dashboard/search', 'Employee\DashboardController@search_item')->name('search_item');

    Route::post('/employee/dashboard/search', 'Employee\DashboardController@get_item')->name('get_item');


    Route::post('/employee/dashboard/order/', 'Employee\OrderController@store')->name('order');

    // Route::get('/employee/dashboard/search/', 'Employee\DashboardController@search')->name('search');

    // Route::get('/{any}', function () {
    //     return view('welcome');
    // })->where('any', '.*');
});



Route::middleware('guest')->group(function () {
    Route::get('/login/admin', 'AuthController@login_admin')->name('login_admin');
    Route::post('/login/admin', 'AuthController@store_admin')->name('store_admin');
    Route::get('/login/pegawai', 'AuthController@login_employee')->name('login_employee');
    Route::post('/login/pegawai', 'AuthController@store_employee')->name('store_employee');
});

Route::get('/logout', 'AuthController@logout')->name('logout');
