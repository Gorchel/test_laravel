<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');

            $table->integer('order_state')->unsigned();
            $table->foreign('order_state')->references('state_id')->on('states');

            $table->dateTime('order_add_time');

            $table->integer('order_good')->unsigned();
            $table->foreign('order_good')->references('good_id')->on('goods');

            $table->string('order_client_phone',50);
            $table->string('order_client_name',50);

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
        Schema::drop('orders');
    }
}
