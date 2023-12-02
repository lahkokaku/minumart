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
         * 1 -> On Check
         * 2 -> Making
         * 3 -> Ready
         * 4 -> Picked Up
         */

        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("transaction_date");
            $table->double("total_price");
            $table->enum("status", [0, 1, 2, 3]);
            $table->date("picked_time")->nullable();
            $table->unsignedBigInteger("admin_id")->nullable();
            $table->unsignedBigInteger("user_id");

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('admin_id')->references('id')->on('admins');
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
