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
            $table->string("productTag");
            $table->integer("quantity");
            $table->string("saleType");
            $table->string("name");
            $table->string("customerName");
            $table->string("customerEmail")->nullable();
            $table->string("phoneNumber");
            $table->integer("priceSale");
            $table->integer("priceProducr");
            $table->integer("priceOffer")->nullable();
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
