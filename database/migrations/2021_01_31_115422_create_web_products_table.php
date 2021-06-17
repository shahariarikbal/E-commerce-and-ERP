<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cat_id')->unsigned();
            $table->integer('brand_id')->nullable()->unsigned();
            $table->string('sku')->nullable();
            $table->string('name');
            $table->float('price', 10, 2);
            $table->float('pre_price', 10, 2)->nullable();
            $table->string('product_type');
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
        Schema::dropIfExists('web_products');
    }
}
