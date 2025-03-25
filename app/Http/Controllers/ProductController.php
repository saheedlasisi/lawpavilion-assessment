<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Products;

class ProductController extends Controller
{


    public function index()
    {

        $title = "Products";

        // $create = new Customers;
        // $create->name = 'saheed';
        // $create->email = 'lasisisaheed5@gmail.com';
        // $create->save();

        $products = Products::orderBy('id', 'DESC')->paginate(10);

        return view('pages.products')->with(['title' => $title, 'products' => $products]);
    }




    //
}