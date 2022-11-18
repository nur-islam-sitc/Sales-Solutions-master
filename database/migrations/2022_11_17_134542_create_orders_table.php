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
            $table->sting('order_no');
            $table->sting('customer_name');
            $table->sting('customer_phone');
            $table->sting('customer_address');
            $table->sting('order_status')->default('pending')->comment('pending,confirmed,follow_up,shipped,delivery,returned,cancel');
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
