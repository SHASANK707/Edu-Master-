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
        Schema::create('parent_faculty_student_class_mapping', function (Blueprint $table) {
            $table->id('par_fac_stu_clas_id'); // Primary Key
            $table->UnsignedBigInteger('parent_id'); // Foreign Key (Parent)
            $table->UnsignedBigInteger('faculty_id'); // Foreign Key (Faculty)
            $table->UnsignedBigInteger('student_id'); // Foreign Key (Student)
            $table->UnsignedBigInteger('class_id'); // Foreign Key (Management)
            $table->unsignedBigInteger('institute_id');
            $table->timestamps(); // Adds created_at and updated_at columns
            
            // Setting up foreign key constraints
            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
            $table->foreign('parent_id')->references('parent_id')->on('parent') ->onDelete('cascade');
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty_info')->onDelete('cascade');
           $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade');
           $table->foreign('class_id')->references('class_id')->on('class')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_faculty_student_class_mapping');
    }
};
