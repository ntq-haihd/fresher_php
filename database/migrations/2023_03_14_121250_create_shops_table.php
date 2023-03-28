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
            $table->string('email')->unique();
            $table->string('password');
            $table->char('phone_number')->unique();
            $table->string('avatar')->nullable();
            $table->string('zipcode');
            $table->text('description');
            $table->enum('status', [0, 1]);
            $table->integer('count_views');
            $table->integer('count_solds');
            $table->integer('count_products');
            $table->integer('count_orders');
            $table->float('earnings')->nullable();
            $table->float('profit')->nullable();
            $table->integer('refunds');
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
