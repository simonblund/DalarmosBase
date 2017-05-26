<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('api_username')->nullable();
            $table->string('owner_id')->nullable();
            $table->string('APIType_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('vacancy')->nullable();
            $table->string('driverslicence')->nullable();
            $table->string('primary_phone');
            $table->string('secondary_phone')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('street_address')->nullable();
            $table->string('city_address')->nullable();
            $table->string('postcode_address')->nullable();
            $table->string('country_address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('fire_department');
            $table->boolean('is_admin')->default('0');
            $table->boolean('is_API')->default('0');
            $table->string('password');
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
