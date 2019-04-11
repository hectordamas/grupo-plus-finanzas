<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->text('beneficiary')->nullable();
          $table->float('amount', 100, 2)->nullable();
          $table->integer('exchange_id')->unsigned();
          $table->foreign('exchange_id')->references('id')->on('exchanges');
          $table->integer('account_id')->unsigned();
          $table->foreign('account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
