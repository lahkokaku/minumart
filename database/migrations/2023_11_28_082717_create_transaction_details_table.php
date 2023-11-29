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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('transaction_header_id');
            $table->unsignedBigInteger('beverage_id');
            $table->integer('quantity')->nullable();
            $table->double('total_price')->nullable();

            $table->foreign('transaction_header_id')->references('id')->on('transaction_headers');
            $table->foreign('beverage_id')->references('id')->on('beverages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
