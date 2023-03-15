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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('phone_number')->unique();
            $table->string('avatar')->nullable();
            $table->string('zipcode');
            $table->text('description');
            $table->enum('status', ['active', 'block']);
            $table->float('count_rating');
            $table->integer('count_views');
            $table->integer('count_sold');
            $table->integer('count_products');
            $table->integer('count_orders');
            $table->numberic('earnings');
            $table->numberic('profit');
            $table->integer('count_refund_products');
            $table->string('city');
            $table->string('country');
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
};
