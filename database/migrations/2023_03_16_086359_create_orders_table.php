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
            $table->string('order_code')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_address_id');
            $table->unsignedBigInteger('user_credit_id')->nullable();
            $table->unsignedBigInteger('discount_code_id')->nullable();
            $table->unsignedBigInteger('shipping_method_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->enum('status', [0, 1, 2])->default(0);
            $table->float('tax')->nullable();
            $table->float('total');
            $table->float('sub_total');
            $table->date('delivery_date');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_address_id')->references('id')->on('user_addresses');
            $table->foreign('user_credit_id')->references('id')->on('user_credits');
            $table->foreign('discount_code_id')->references('id')->on('discount_code');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
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
