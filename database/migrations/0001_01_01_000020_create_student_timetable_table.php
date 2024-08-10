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
        Schema::create('student_timetable', function (Blueprint $table) {
            $table->increments('stud_timetable')->primary(); // Primary Key
            $table->unsignedBigInteger('institute_id');
            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
                        $table->unsignedBigInteger('student_id'); // Foreign Key (Student)
            $table->unsignedBiginteger('faculty_id'); // Foreign Key (Faculty)
            $table->unsignedBigInteger('course_id'); // Foreign Key (Super Admin)
            $table->string('day', 100);
            $table->string('time', 100);
            $table->string('location', 100);
            $table->timestamps();
            
            // Setting up foreign key constraints
            $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade');
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty_info')->onDelete('cascade');
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');

        }); 
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_timetable');
    }
};
