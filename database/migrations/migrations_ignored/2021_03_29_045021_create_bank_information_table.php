<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('bank_name');
            $table->string('account_no');
            $table->string('swift_code');
            $table->string('cart_no');
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
        Schema::dropIfExists('bank_information');
    }
}
