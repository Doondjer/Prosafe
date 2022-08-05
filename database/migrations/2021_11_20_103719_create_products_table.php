<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->double('cost', 16, 2)->nullable()->comment('Ukupan trosak proizvodnje prozvoda');
            $table->string('currency',3)->default('RSD');
            $table->decimal('depth', 12, 4)->nullable()->comment('Dubina proizvoda zbog slanja');
            $table->text('description')->comment('Detaljan opis proizvoda');
            $table->timestamp('featured_at')->nullable()->comment('Da li je istaknut proizvod');
            $table->decimal('height', 12, 4)->nullable()->comment('Visina proizvoda zbog slanja');
            $table->decimal('length', 12, 4)->nullable()->comment('Dužina proizvoda zbog slanja');
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_title', 250)->nullable();
            $table->string('name', 250)->comment('Naziv proizvoda');
            $table->integer('nb_views')->default(0)->comment('Broj Pregleda');
            $table->timestamp('new_at')->nullable()->comment('Da li je novi proizvod');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('Ako je varijanta nekog proizvoda preko ovog se povezuje');
            $table->double('price', 16, 2)->comment('Regularna cena proizvoda');
            $table->timestamp('published_at')->nullable()->comment('Proizvod je objavljen tj vidljiv u prodavnici');
            $table->text('short_description')->nullable()->comment('Kratak opis proizvoda... Bice prikazan u kartici pored slike');
            $table->string('sku', 250)->unique()->comment('Jedinstvena SKU oznaka proizvoda. Barkod!');
            $table->string('slug', 255)->unique()->comment('Deo URL (u naslovnoj traci pretrazivaca, linkovima...  ) koji identifikuje ovaj proizvod');
            $table->double('special_price', 16, 2)->nullable()->comment('Akcijska cena proizvoda ukoliko se zeli');
            $table->timestamp('special_price_from')->nullable()->comment('Akcijska cena je aktivna OD ovog vremena');
            $table->timestamp('special_price_to')->nullable()->comment('Akcijska cena je aktivna DO ovog vremena');
            $table->decimal('weight', 12, 4)->nullable()->comment('Tezina proizvoda zbog slanja');
            $table->decimal('width', 12, 4)->nullable()->comment('Sirina proizvoda zbog slanja');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('products')->onDelete('cascade');


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::create('cross_selling_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('cross_selling_id');
            $table->timestamps();

            $table->unique(['product_id', 'cross_selling_id']);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('cross_selling_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');

        Schema::dropIfExists('cross_selling_product');

        Schema::dropIfExists('products');

    }
}
