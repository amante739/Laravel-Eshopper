<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('shipping_option')->nullable();
            $table->string('shipping_method')->nullable();
            $table->tinyInteger('order_status')->default(1);
            $table->string('order_amount');
            $table->integer('currency_id')->nullable();
            $table->string('tax_amount')->nullable();
            $table->string('shipping_amount')->nullable();
            $table->text('order_description');
            $table->string('coupon_code')->nullable();
            $table->string('order_discount_amount')->nullable();
            $table->string('sub_total');
            $table->tinyInteger('order_is_confirmed')->default(0);
            $table->integer('order_confirmed_by')->unsigned()->nullable();
            $table->string('order_discount_description')->nullable();
            $table->tinyInteger('order_is_finished')->default(0);
            $table->integer('order_finished_by')->unsigned()->nullable();
            $table->string('order_token')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address_1');
            $table->text('address_2');
            $table->string('city');
            $table->string('zip');
            $table->string('phone');
            $table->string('email');
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
        Schema::dropIfExists('orders');
    }
}
