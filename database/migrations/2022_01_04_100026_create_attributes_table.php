<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attribute_name');
            $table->string('attribute_slug')->nullable();
            $table->string('attribute_display_layout');
            $table->boolean('attribute_is_comparable')->default(1);
            $table->integer('attribute_order')->default(0);
            $table->boolean('attribute_is_use_in_product_listing')->default(1);
            $table->boolean('attribute_status')->default(1);
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
        Schema::dropIfExists('attributes');
    }
}
