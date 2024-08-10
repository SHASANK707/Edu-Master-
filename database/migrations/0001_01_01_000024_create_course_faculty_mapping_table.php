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
        Schema::create('course_faculty_mapping', function (Blueprint $table) {
            $table->id('course_faculty_id'); // Primary Key
            $table->unsignedBigInteger('institute_id');
            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
                        $table->unsignedBigInteger('course_id'); // Foreign Key (Super Admin)
            $table->unsignedBigInteger('faculty_id'); // Foreign Key (Faculty)
            $table->timestamps(); // Adds created_at and updated_at columns
            
            // Setting up foreign key constraints
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty_info')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_faculty_mapping');
    }
};
