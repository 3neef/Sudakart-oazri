<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('offer_id')->nullable();
            $table->foreignId('coupon_id')->nullable();
            $table->foreignId('up_sell_id')->nullable();
            $table->foreignId('product_id');
            $table->integer('quantity');
            $table->float('price');
            $table->foreignId('driver_id')->nullable();
            $table->set('status', ['pending', 'taken', 'delivered', 'packaging','canceled','returned'])->default('pending');
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
        Schema::dropIfExists('order_products');
    }
}
