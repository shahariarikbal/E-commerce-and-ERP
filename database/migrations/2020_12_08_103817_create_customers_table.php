<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('invoice_no')->unique();
            $table->string('office_contact')->nullable()->unique();
            $table->string('email_one')->nullable()->unique();
            $table->string('fax_no')->nullable();
            $table->text('address_one')->nullable();
            $table->text('address_two')->nullable();
            $table->string('city_one')->nullable();
            $table->string('country_one')->nullable();
            $table->string('country_two')->nullable();
            $table->string('customer_web')->nullable();
            $table->string('customer_ship_acc')->nullable();
            $table->float('debit_amount', 10, 2)->nullable();
            $table->float('credit_amount', 10, 2)->nullable();
            $table->float('balance', 10, 2)->nullable();
            $table->string('mobile_no_one')->nullable()->unique();
            $table->string('email_two')->nullable()->unique();
            $table->string('city_two')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
