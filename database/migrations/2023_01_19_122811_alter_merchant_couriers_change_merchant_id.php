<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMerchantCouriersChangeMerchantId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_couriers', function (Blueprint $table) {
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_couriers', function (Blueprint $table) {
            $table->dropConstrainedForeignId('merchant_id');
        });
    }
}
