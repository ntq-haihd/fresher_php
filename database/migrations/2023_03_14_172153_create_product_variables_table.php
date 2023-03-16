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
        Schema::create('product_variables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('product_variable_code')->unique();
            $table->string('images')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('count_orders')->nullable();
            $table->integer('stocks');
            $table->float('import_price');
            $table->float('regular_price');
            $table->float('sale_price')->nullable();
            $table->float('tax')->default(5);
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
