<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Customers;


class CustomerController extends Controller
{

    public function index()
    {

        $title = "Customers";

        // $create = new Customers;
        // $create->name = 'saheed';
        // $create->email = 'lasisisaheed5@gmail.com';
        // $create->save();

        $customers = Customers::orderBy('id', 'DESC')->paginate(10);

        return view('pages.customers')->with(['title' => $title, 'customers' => $customers]);
    }


    public function generate()
    {

        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            // DB::table('customers')->insert([
            //     'name' => $faker->name,
            //     'email' => $faker->unique()->safeEmail,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            $create = new Customers;
            $create->name = $faker->name;
            $create->email = $faker->unique()->safeEmail;
            $create->save();
        }

        return redirect('/')->with(['success' => '100 customers generated successfully']);

        //
    }




    //
}
