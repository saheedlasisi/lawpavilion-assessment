<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class PopulateConsolidatedOrdersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->leftJoin('consolidated_orders', 'orders.id', '=', 'consolidated_orders.order_id')
            ->whereNull('consolidated_orders.order_id')
            ->select([
                'customers.id as customer_id', 'customers.name as customer_name', 'customers.email as customer_email',
                'orders.id as order_id', 'orders.order_date', 'orders.status', 'orders.total_amount',
                'products.id as product_id', 'products.name as product_name', 'products.sku',
                'order_items.price', 'order_items.quantity',
                DB::raw('NOW() as created_at'), DB::raw('NOW() as updated_at')
            ])
            ->chunk(10000, function ($orders) {
                DB::table('consolidated_orders')->insert($orders->toArray());
            });
    }
}
