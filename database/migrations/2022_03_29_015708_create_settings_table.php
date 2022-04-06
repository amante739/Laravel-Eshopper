<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('site_description')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_facebook')->nullable();
            $table->string('logo')->nullable();
            $table->string('site_map')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
