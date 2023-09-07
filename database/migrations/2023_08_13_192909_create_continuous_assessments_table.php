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
        Schema::create('continuous_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('academic_year')->nullable();
            $table->string('term')->nullable();
            $table->string('current_class')->nullable();
            $table->string('subject_name')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('class_score_1')->nullable();
            $table->string('class_score_2')->nullable();
            $table->string('class_score_3')->nullable();
            $table->string('class_score_4')->nullable();
            $table->string('total_class_score')->nullable();
            $table->string('exams_score')->nullable();
            $table->string('total_exams_score')->nullable();
            $table->string('total_score')->nullable();
            $table->string('position')->nullable();
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
        Schema::dropIfExists('continuous_assessments');
    }
};
