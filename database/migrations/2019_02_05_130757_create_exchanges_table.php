<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->text('date')->nullable();
          $table->float('qty', 100, 2)->nullable();
          $table->text('seller')->nullable();
          $table->float('rate',100,2)->nullable();
          $table->text('total')->nullable();
          $table->text('responsable')->nullable();
          $table->text('concept')->nullable();
          $table->float('feed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
