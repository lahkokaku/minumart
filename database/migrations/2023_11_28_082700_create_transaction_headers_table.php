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
        /**
         * Status
         * 0 -> Rejected
         * 1 -> Pending 
         * 2 -> Making
         * 3 -> Ready
         * 4 -> Picked Up
         */

        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("transaction_date");
            $table->double("total_price");
            $table->enum("status", [0, 1, 2, 3, 4]);
            $table->dateTime("picked_time")->nullable();
            $table->unsignedBigInteger("admin_id")->nullable();
            $table->unsignedBigInteger("payment_provider_id");
            $table->string("account_name");
            $table->string("account_number");
            $table->string("payment_proof");
            $table->unsignedBigInteger("user_id");

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('payment_provider_id')->references('id')->on('payment_providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_headers');
    }
};
