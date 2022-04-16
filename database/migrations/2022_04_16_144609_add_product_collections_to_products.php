<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductCollectionsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
             $table->tinyInteger('pro_newarrival')->unsigned()->default(0);
             $table->tinyInteger('pro_newproduct')->unsigned()->default(0);
             $table->tinyInteger('pro_bestseller')->unsigned()->default(0);
             $table->tinyInteger('pro_specialoffer')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
              $table->dropColumn('pro_newarrival');
              $table->dropColumn('pro_newproduct');
              $table->dropColumn('pro_bestseller');
              $table->dropColumn('pro_specialoffer');
        });
    }
}
