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

Route::get('/products', 'CustomerController@index')->name('website.products');
Route::get('/product/generate', 'CustomerController@generate')->name('website.products.generate');
