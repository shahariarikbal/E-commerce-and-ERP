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
            $table->bigIncrements('id');
            $table->string('bar_code')->nullable();

            $table->integer('qty')->nullable();

            $table->string('name')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_model')->nullable();
            $table->integer('cat_id')->unsigned();
            $table->integer('sub_cat_id')->nullable();
            $table->integer('brand_id')->unsigned()->nullable();

            $table->integer('manufacture_id')->unsigned()->nullable();
            $table->string('sku')->nullable();
            $table->string('unit')->nullable();
            $table->float('vat', 8, 2)->nullable();
            $table->float('tax', 8, 2)->nullable();
            $table->float('sale_price', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->text('details')->nullable();
            $table->float('shipping_cost', 10, 2)->nullable();
            $table->float('cost', 10, 2)->nullable();
            $table->string('factory_option')->nullable();

            $table->integer('status')->default(0);
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
