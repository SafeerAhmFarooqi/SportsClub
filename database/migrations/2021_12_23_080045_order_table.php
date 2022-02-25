<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::migrate('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('address1');
            $table->string('address2');
            $table->string('country');
            $table->string('state');
            $table->string('zip');
            $table->boolean('save_info');
            $table->string('payment_method');
            $table->string('payment_status');
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
        //
    }
}
