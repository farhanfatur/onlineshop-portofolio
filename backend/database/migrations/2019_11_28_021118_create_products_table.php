<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('name_slug')->nullable();
            $table->string('code')->nullable();
            $table->integer('stock')->nullable();
            $table->unsignedBigInteger('catalog_product_id');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('seller_id');
            $table->integer('price')->nullable();
            $table->integer('point')->nullable();
            $table->enum('is_active', ['1', '0']);
            $table->enum('is_sold', ['1', '0']);
            $table->foreign('catalog_product_id')->references('id')->on('catalog_products')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
