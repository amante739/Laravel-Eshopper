<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->text('pro_description')->nullable();
            $table->longText('pro_content')->nullable();
            $table->text('pro_images')->nullable();
            $table->text('pro_main_image')->nullable();
            $table->string('pro_sku');
            $table->integer('pro_order')->unsigned()->default(0);
            $table->integer('pro_quantity')->unsigned()->nullable();
            $table->tinyInteger('pro_allow_checkout_when_out_of_stock')->unsigned()->default(0);
            $table->tinyInteger('pro_with_storehouse_management')->unsigned()->default(0);
            $table->tinyInteger('pro_is_featured')->unsigned()->default(0);
            $table->text('pro_options')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('subcategory_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->tinyInteger('pro_is_variation')->default(0);
            $table->json('pro_variations')->nullable();
            $table->tinyInteger('pro_is_searchable')->default(0);
            $table->tinyInteger('pro_is_show_on_list')->default(0);
            $table->tinyInteger('pro_sale_type')->default(0);
            $table->double('pro_buy_price')->unsigned()->nullable();
            $table->double('pro_sale_price')->unsigned()->nullable();
            $table->double('pro_discount')->unsigned()->nullable();
            $table->timestamp('pro_start_date')->nullable();
            $table->timestamp('pro_end_date')->nullable();
            $table->float('pro_length')->nullable();
            $table->float('pro_wide')->nullable();
            $table->float('pro_height')->nullable();
            $table->float('pro_weight')->nullable();
            $table->string('pro_barcode')->nullable();
            $table->string('pro_length_unit', 20)->nullable();
            $table->string('pro_wide_unit', 20)->nullable();
            $table->string('pro_height_unit', 20)->nullable();
            $table->string('pro_weight_unit', 20)->nullable();
            $table->integer('pro_views')->unsigned()->default(0);
            $table->integer('pro_added_by')->unsigned();
            $table->string('pro_stock_status', 60)->default('in_stock');
            $table->string('pro_status', 60)->default('published');
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
        Schema::dropIfExists('products');
    }
}
