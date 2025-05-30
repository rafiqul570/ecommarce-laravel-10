<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('product_name');
            $table->integer('product_price');
            $table->string('product_quantity');
            $table->integer('category_id');
            $table->string('category_name');
            $table->integer('color_id');
            $table->string('color_name');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('shippingCost');
            $table->string('product_img');
            $table->string('slug');
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
};
