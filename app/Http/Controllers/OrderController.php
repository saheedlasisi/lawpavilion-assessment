<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\OrderItems;
use App\Orders;
use App\ConsolidatedOrders;
use Faker\Factory as Faker;
use App\Exports\ConsolidatedOrdersExport;
use Maatwebsite\Excel\Facades\Excel;

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

        // Now let's fetch a random customer
        $customer = DB::table('customers')->inRandomOrder()->first();
        if (!$customer) {

            return redirect('/orders')->with(['error' => 'No customers found. Generate customers first.']);
        }


        // order
        $orderId = DB::table('orders')->insertGetId([
            'customer_id' => $customer->id,
            'order_date' => now(),
            'status' => $faker->randomElement(['Pending', 'Completed', 'Cancelled']),
            'total_amount' => 0, // Coming to this later
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // get a random product
        $product = DB::table('products')->inRandomOrder()->first();
        if (!$product) {
            return redirect('/orders')->with(['error' => 'No products found. Generate products first.'], 400);
        }


        // order item
        $quantity = $faker->numberBetween(1, 5);
        $price = $product->price;
        $totalPrice = $quantity * $price;

        //let's insert an item
        DB::table('order_items')->insert([
            'order_id' => $orderId,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Now let's update the order total price.
        DB::table('orders')->where('id', $orderId)->update(['total_amount' => $totalPrice]);

        return redirect('/orders')->with(['success' => 'Order with item generated successfully']);

        //
    }



    public function consolidatedorders()
    {

        $title = "Consolidated Orders";

        $consolidatedorders = ConsolidatedOrders::orderBy('id', 'DESC')->paginate(10);

        return view('pages.consolidatedorders')->with(['title' => $title, 'consolidatedorders' => $consolidatedorders]);
    }


    public function exportConsolidatedOrders()
    {
        return Excel::download(new ConsolidatedOrdersExport, 'consolidated_orders.xlsx');
    }





    //
}
