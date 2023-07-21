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
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('staff_id', 10)->nullable();
            $table->string('sur_name', 50)->nullable();
            $table->string('other_names', 50)->nullable();
            $table->string('date_of_birth', 10)->nullable();
            $table->string('gender', 7)->nullable();
            $table->string('phone_number', 10)->nullable();
            $table->string('mobile_number', 10)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('residential_address')->nullable();
            $table->string('department', 25)->nullable();
            $table->string('job_title', 100)->nullable();
            $table->string('date_of_employment', 10)->nullable();
            $table->string('staff_image')->nullable();
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
        Schema::dropIfExists('staff');
    }
};
