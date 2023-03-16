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
            $table->string('title')->unique();
            $table->string('product_code');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->string('images')->nullable();
            $table->enum('status', [0, 1]);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->integer('count_views');
            $table->unsignedBigInteger('shop_id');
            $table->integer('total_orders');
            $table->integer('total_stocks');
            $table->string('reference_product');
            $table->string('tags');


            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('shop_id')->references('id')->on('shops');



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
