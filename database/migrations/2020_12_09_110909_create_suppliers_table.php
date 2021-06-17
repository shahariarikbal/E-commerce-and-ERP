<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('office_contact')->nullable()->unique();
            $table->string('mobile_no_one')->nullable()->unique();
            $table->string('email_one')->nullable()->unique();
            $table->string('email_two')->nullable()->unique();
            $table->string('fax_no')->nullable();
            $table->text('address_one')->nullable();
            $table->text('address_two')->nullable();
            $table->string('city_one')->nullable();
            $table->string('city_two')->nullable();
            $table->string('country_one')->nullable();
            $table->string('country_two')->nullable();
            $table->string('supplier_web')->nullable();
            $table->float('previous_due', 10, 2)->nullable();
            $table->float('previous_advance', 10, 2)->nullable();
            $table->float('balance', 10, 2)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('suppliers');
    }
}
