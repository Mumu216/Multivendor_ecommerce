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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('sku')->nullable();
            $table->string('slug');
            $table->string('thumb')->nullable();
            $table->string('image')->nullable();
            $table->string('gallery_images')->nullable();
            $table->string('stock')->nullable();
            $table->text('description');
            $table->string('category_id');
            $table->string('atr')->nullable();
            $table->string('atr_item')->nullable();
            $table->integer('regular_price')->unique();
            $table->integer('offer_price')->nullable();
            $table->string('status')->default(1)->comment('0=Inactive , 1=Active');
            $table->string('assign')->nullable();
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
};
