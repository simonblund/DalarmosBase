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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('vacancy');
            $table->string('driverslicence');
            $table->string('primary_phone');
            $table->string('secondary_phone')->nullable();
            $table->string('telegram_id');
            $table->string('street_address')->nullable();
            $table->string('city_address')->nullable();
            $table->string('postcode_address')->nullable();
            $table->string('country_address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('fire_department');
            $table->boolean('is_admin');
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
