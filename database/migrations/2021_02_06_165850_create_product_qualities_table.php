<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_qualities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('web_product_id')->nullable();
            $table->string('new')->nullable();
            $table->string('hot')->nullable();
            $table->string('sale')->nullable();
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
        Schema::dropIfExists('product_qualities');
    }
}
