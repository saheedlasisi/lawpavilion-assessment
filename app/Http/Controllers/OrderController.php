<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\OrderItems;
use App\Orders;
use Faker\Factory as Faker;

class OrderController extends Controller
{

    public function index()
    {

        $title = "Orders";

        $orders = Orders::orderBy('id', 'DESC')->paginate(10);

        return view('pages.orders')->with(['title' => $title, 'orders' => $orders]);
    }


    public function generate()
    {
        $faker = Faker::create();






        //
    }








    //
}
