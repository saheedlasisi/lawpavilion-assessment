<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
//use App\Jobs\PopulateConsolidatedOrdersJob;
use DB;

class PopulateConsolidatedOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:populate-consolidated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the consolidated_orders table with denormalized data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Populating consolidated_orders table...");

        // DB::table('order_items')
        //     ->join('orders', 'order_items.order_id', '=', 'orders.id')
        //     ->join('customers', 'orders.customer_id', '=', 'customers.id')
        //     ->join('products', 'order_items.product_id', '=', 'products.id')
        //     ->leftJoin('consolidated_orders', 'orders.id', '=', 'consolidated_orders.order_id')
        //     ->whereNull('consolidated_orders.order_id') // Avoid duplicates
        //     ->select([
        //         'customers.id as customer_id', 'customers.name as customer_name', 'customers.email as customer_email',
        //         'orders.id as order_id', 'orders.order_date', 'orders.status', 'orders.total_amount',
        //         'products.id as product_id', 'products.name as product_name', 'products.sku',
        //         'order_items.price', 'order_items.quantity',
        //         DB::raw('NOW() as created_at'), DB::raw('NOW() as updated_at')
        //     ])
        //     ->orderBy('orders.id') // 
        //     ->chunk(10000, function ($orders) {
        //         DB::table('consolidated_orders')->insert($orders->toArray());
        //     });


        DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join(
                'products',
                'order_items.product_id',
                '=',
                'products.id'
            )
            ->leftJoin('consolidated_orders', 'orders.id', '=', 'consolidated_orders.order_id')
            ->whereNull('consolidated_orders.order_id') // Prevent duplicates
            ->select([
                'customers.id as customer_id', 'customers.name as customer_name', 'customers.email as customer_email',
                'orders.id as order_id', 'orders.order_date', 'orders.status', 'orders.total_amount',
                'products.id as product_id', 'products.name as product_name', 'products.sku',
                'order_items.price', 'order_items.quantity',
                DB::raw('NOW() as created_at'), DB::raw('NOW() as updated_at')
            ])
            ->orderBy('orders.id')
            ->chunk(10000, function ($orders) {
                $ordersArray = json_decode(
                    json_encode($orders),
                    true
                ); // Convert objects to arrays
                DB::table('consolidated_orders')->insert($ordersArray);
            });

        $this->info("consolidated_orders table populated successfully.");

        // PopulateConsolidatedOrdersJob::dispatch();
        // $this->info("Job dispatched to populate consolidated_orders.");
    }



    //
}
