<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RefreshConsolidatedOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:refresh-consolidated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the consolidated_orders table every week';

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
        Artisan::call('orders:populate-consolidated');
        $this->info("consolidated_orders table refreshed successfully.");
    }
}
