<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('vendor_id');
            $table->foreignId('market_id')->nullable();
            $table->foreignId('city_id');
            $table->string('shop_name');
            $table->string('shop_en_name');
            $table->string('shop_Address');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
