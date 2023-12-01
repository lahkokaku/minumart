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
        Schema::create('beverages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("beverage_type_id");
            $table->unsignedBigInteger("outlet_id");
            $table->string("name");
            $table->double("price");
            $table->double("quantity");
            $table->double("rating");
            $table->string("photo")->nullable();

            $table->foreign('beverage_type_id')->references('id')->on('beverage_types');
            $table->foreign('outlet_id')->references('id')->on('outlets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beverages');
    }
};
