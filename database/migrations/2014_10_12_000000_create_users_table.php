<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->boolean('super_user')->default(0);
            $table->boolean('manage_supers')->default(0);
            $table->json('all_permissions')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
