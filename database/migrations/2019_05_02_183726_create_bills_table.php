<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('type');
            $table->float('amount', 100, 2);
            $table->string('client');
            $table->string('date');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('users');
            $table->string('number');
            $table->string('seller');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
