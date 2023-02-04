<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string("sortDescription");
            $table->json("color");
            $table->json("size");
            $table->integer("price");
            $table->integer("quantity");
            $table->string("fulDetail");
            $table->string("gender");
            $table->string("saleType");
            $table->integer("wholeSaleQuantity");
            $table->string("productTag");
            $table->string("image");
            $table->unsignedBigInteger("subCategory_id");
            $table->foreign('subCategory_id')->references('id')->on('sub_categories')->onDelete('cascade');


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
        Schema::dropIfExists('products');
    }
}
