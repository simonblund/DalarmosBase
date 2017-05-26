<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class APITypes extends Migration
{
    /**
     * Run the migrations.
     * access levels = [1:read, 2:create, 3:edit, 4:delete,];
     * @return void
     */
    public function up()
    {
        Schema::create('api_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('access_vehicles');
            $table->string('access_vehicles_incident');
            $table->string('access_users');
            $table->string('access_under_way');
            $table->string('access_incident');
            $table->string('access_incident_report');
            
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
       Schema::dropIfExists('api_types');
    }
}
