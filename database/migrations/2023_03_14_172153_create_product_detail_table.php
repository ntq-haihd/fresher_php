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
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('product_detail_code');
            $table->integer('stocks')->nullable();
            $table->string('images')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('count_orders')->nullable();
            $table->float('rating');
            $table->float('import_price')->nullable();
            $table->float('regular_price')->nullable();
            $table->float('sale_price')->nullable();
            $table->float('tax');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail');
    }
};
