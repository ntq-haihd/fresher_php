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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_address_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('discount_code_id')->nullable();
            $table->unsignedBigInteger('shipping_method_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->enum('status', ['pending', 'done', 'cancelled'])->default('pending');
            $table->integer('tax');
            $table->float('sub_total');
            $table->date('delivery_date');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_address_id')->references('id')->on('user_address');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('discount_code_id')->references('id')->on('discount_code');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_method');
            $table->foreign('payment_method_id')->references('id')->on('payment_method');
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
};
