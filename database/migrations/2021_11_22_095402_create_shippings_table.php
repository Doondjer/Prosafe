<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->string('carrier');
            $table->string('carrier_title');
            $table->string('method');
            $table->string('method_title');
            $table->string('method_description')->nullable();
            $table->double('price', 16,2)->default(0)->nullable();
            $table->timestamps();

            $table->unique(['carrier', 'method']);
        });

        Schema::create('product_shipping', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('shipping_id');

            $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');
            $table->foreign('shipping_id')->on('shippings')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_shipping');

        Schema::dropIfExists('shippings');
    }
}
