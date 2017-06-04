<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('shortcode');
            $table->string('phone');
            $table->integer('seats')->nullable();
            $table->integer('priority')->nullable();
            $table->string('drivers_license');
            $table->string('description')->nullable();
            $table->string('vehicle_registration')->nullable();
            $table->string('km')->nullable();
            $table->string('year')->nullable();

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
         Schema::dropIfExists('vehicles');
    }
}
