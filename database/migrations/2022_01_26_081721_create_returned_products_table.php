<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returned_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_product_id');
            $table->foreignId('driver_id')->nullable();
            $table->text('reason');
            $table->set('status', ['pending', 'rejected', 'canceled', 'approved', 'returned'])->default('pending');
            $table->foreignId('order_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('returned_products');
    }
}
