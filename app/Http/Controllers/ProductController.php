<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Products;
use DB;

class ProductController extends Controller
{


    public function index()
    {

        $title = "Products";

        $products = Products::orderBy('id', 'DESC')->paginate(10);

        return view('pages.products')->with(['title' => $title, 'products' => $products]);
    }


    public function generate()
    {

        $faker = Faker::create();

        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('products')->insert([
                'name' => $faker->word(),
                'sku' => strtoupper($faker->unique()->bothify('???-#####')),
                'price' => $faker->randomFloat(2, 1000, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect('/products')->with(['success' => '50 customers generated successfully']);

        //
    }




    //
}
