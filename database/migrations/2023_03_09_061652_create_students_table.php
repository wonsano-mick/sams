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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('sur_name');
            $table->string('other_names');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('program')->nullable();
            $table->string('house')->nullable();
            $table->string('residential_status')->nullable();
            $table->string('current_class');
            $table->string('actual_class')->nullable();
            $table->string('term')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('student_image')->nullable();
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
        Schema::dropIfExists('students');
    }
};
