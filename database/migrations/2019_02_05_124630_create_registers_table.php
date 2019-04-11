<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->text('date')->nullable();
          $table->text('type')->nullable();
          $table->text('beneficiary')->nullable();
          $table->text('reason')->nullable();
          $table->text('status')->nullable();
          $table->float('amount', 100, 2)->nullable();
          $table->float('rate', 100, 2)->nullable();
          $table->text('description')->nullable();
          $table->text('contable')->nullable();
          $table->float('feed', 100, 2)->nullable();
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
        Schema::dropIfExists('registers');
    }
}
