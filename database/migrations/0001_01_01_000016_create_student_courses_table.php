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
        Schema::create('student_courses', function (Blueprint $table) {
            $table->bigIncrements('id'); // Assuming 'id' is an auto-incrementing primary key
            $table->unsignedBigInteger('student_id')->unsigned(); // Assuming student_id is a foreign key referencing another table
            $table->unsignedBigInteger('institute_id');
            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');           
             $table->unsignedBigInteger('course_id'); // Assuming course_id is a foreign key referencing another table

            // Define foreign key constraints
            $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade');
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
             $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
