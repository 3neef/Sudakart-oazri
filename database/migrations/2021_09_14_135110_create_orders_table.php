<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('delivery_method_id');
            $table->foreignId('take_by')->references('id')->on('drivers');
            $table->foreignId('delivered_by')->references('id')->on('drivers');
            $table->float('amount')->default(0);
            $table->float('delivery_amount')->default(0);
            $table->float('total')->default(0);
            $table->float('profit')->default(0);
            $table->text('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->timestamp('taken_at')->useCurrent();
            $table->timestamp('delivered_at')->nullable();
            $table->boolean('gift')->default(0);
            $table->set('payment_method', ['online', 'cash']);
            $table->set('status', ['pending', 'in progress', 'out for delivery', 'On-hold', 'partially completed', 'completed', 'canceled', 'delivered'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
