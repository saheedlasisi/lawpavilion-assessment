<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolidatedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolidated_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->index();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->bigInteger('order_id')->index();
            $table->dateTime('order_date');
            $table->string('status');
            $table->decimal('total_amount', 10, 2);
            $table->bigInteger('product_id')->index();
            $table->string('product_name');
            $table->string('sku');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consolidated_orders');
    }
}
