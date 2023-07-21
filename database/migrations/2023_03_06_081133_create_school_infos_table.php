<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_school', 255)->nullable();
            $table->string('landmark_location_of_school', 255)->nullable();
            $table->string('town_and_region_location_of_school', 150)->nullable();
            $table->string('digital_address_of_school', 50)->nullable();
            $table->string('phone_number_of_school', 25)->nullable();
            $table->string('email_of_school', 50)->nullable();
            $table->string('logo_of_school')->nullable();
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
        Schema::dropIfExists('school_infos');
    }
};
