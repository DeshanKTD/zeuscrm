<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oderno');
            $table->string('email');
            $table->string('model');
            $table->string('amount');
            $table->timestamps('created');
            $table->date('reqdate');
            $table->foreign('email')->references('email')->on('users');
            $table->foreign('model')->references('model')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_orders');
    }
}
