<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->unsigned();
            $table->string('payment_type');
            $table->timestamp('sale_date');
            $table->string('type');
            $table->string('acc_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('acc_name')->nullable();
            $table->string('swift_address')->nullable();
            $table->float('tax', 10, 2)->nullable();
            $table->float('vat', 10, 2)->nullable();
            $table->float('shipping_cost', 10, 2)->nullable();
            $table->float('misc_cost', 10, 2)->nullable();
            $table->float('grand_total', 10, 2)->nullable();
            $table->float('previous_balance', 10, 2)->nullable();
            $table->float('net_total', 10, 2)->nullable();
            $table->float('paid_amount', 10, 2)->nullable();
            $table->float('due_amount', 10, 2)->nullable();
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
        Schema::dropIfExists('sales');
    }
}
