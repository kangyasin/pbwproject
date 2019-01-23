<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('name')->nullable();
            $table->boolean('main_image')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_images');
    }
}
