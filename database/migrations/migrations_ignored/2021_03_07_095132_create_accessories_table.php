<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('model');
            $table->integer('cat_id')->unsigned();
            $table->integer('condition_id')->unsigned();
            $table->integer('sub_cat_id')->nullable();
            $table->integer('brand_id')->unsigned();
            $table->integer('manufacture_id')->unsigned();
            $table->string('sku');
            $table->string('unit');
            $table->string('hot')->nullable();
            $table->string('new')->nullable();
            $table->string('sale')->nullable();
            $table->float('price', 10, 2);
            $table->float('pre_price', 10, 2)->nullable();
            $table->string('image');
            $table->float('vat', 8, 2)->nullable();
            $table->float('tax', 8, 2)->nullable();
            $table->float('shipping_cost', 10, 2)->nullable();
            $table->float('cost', 10, 2);
            $table->string('total_cost');
            $table->string('factory_option')->nullable();
            $table->string('weight');
            $table->string('measurement')->nullable();
            $table->string('short_description');
            $table->longText('long_description');
            $table->longText('key_feature');
            $table->longText('specification');
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
        Schema::dropIfExists('accessories');
    }
}
