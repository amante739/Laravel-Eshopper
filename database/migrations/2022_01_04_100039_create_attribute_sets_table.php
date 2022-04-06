<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->string('attribute_set_name');
            $table->string('attribute_set_slug')->nullable();
            $table->string('attribute_set_color')->nullable();
            $table->string('attribute_set_image')->nullable();
            $table->boolean('attribute_set_is_default')->default(1);
            $table->integer('attribute_set_order')->default(1);
            $table->boolean('attribute_set_status')->default(1);
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
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
        Schema::dropIfExists('attribute_sets');
    }
}
