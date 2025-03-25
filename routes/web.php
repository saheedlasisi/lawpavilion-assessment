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

Route::get('/test', function () {
    //return view('welcome');
});


Route::get('/', 'CustomerController@index')->name('website.index');

Route::get('/customers', 'CustomerController@index')->name('website.customers');
Route::get('/customer/generate', 'CustomerController@generate')->name('website.customers.generate');

Route::get('/products', 'ProductController@index')->name('website.products');
Route::get('/product/generate', 'ProductController@generate')->name('website.products.generate');

Route::get('/orders', 'OrderController@index')->name('website.orders');
Route::get('/order/generate', 'OrderController@generate')->name('website.orders.generate');


Route::get('/consolidatedorders', 'OrderController@consolidatedorders')->name('website.consolidatedorders');
Route::get('/export-consolidated-orders', 'OrderController@exportConsolidatedOrders')->name('website.export-consolidated-orders');
