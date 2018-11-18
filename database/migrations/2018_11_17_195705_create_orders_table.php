<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('email');
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedDecimal('price', 8, 2)->nullable();
            $table->string('currency')->nullable();
            $table->unsignedDecimal('discount', 8, 2)->nullable();
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
