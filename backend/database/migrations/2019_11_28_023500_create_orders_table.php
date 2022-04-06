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
            $table->bigIncrements('id');
            $table->date('date_order');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('statusorder_id');
            $table->unsignedInteger("province_id");
            $table->unsignedInteger("city_id");
            $table->string('address');
            $table->string('image_payment');
            $table->date('date_shipped');
            $table->integer('buyer_price');

            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('statusorder_id')->references('id')->on('statusorders')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
