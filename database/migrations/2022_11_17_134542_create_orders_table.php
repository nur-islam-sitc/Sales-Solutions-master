<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shop_id');
            $table->string('order_no');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->string('order_status')->default('pending')->comment('pending,confirmed,follow_up,shipped,delivery,returned,cancel');
            $table->float('advance',8,2)->default(0);
            $table->boolean('cod')->default(true);
            $table->boolean('invoice_print')->default(false);
            $table->boolean('courier_entry')->default(false);
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
