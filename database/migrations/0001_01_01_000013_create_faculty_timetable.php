<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faculty_timetable', function (Blueprint $table) {
            $table->id('time_table_id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('institute_id');

            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
            $table->string('day',10);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->foreign('staff_id')->references('staff_id')->on('staff_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_timetable');
    }
};
