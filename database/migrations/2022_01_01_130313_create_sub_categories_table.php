<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('subcat_name');
            $table->string('subcat_slug');
            $table->unsignedBigInteger('cat_id');
            $table->text('subcat_description')->nullable();
            $table->integer('subcat_order')->default(0);
            $table->string('subcat_image')->nullable();
            $table->boolean('subcat_is_featured')->default(0);
            $table->boolean('subcat_status')->default(1);
            $table->timestamps();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
