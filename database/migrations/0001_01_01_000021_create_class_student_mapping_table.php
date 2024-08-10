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
        Schema::create('class_student_mapping', function (Blueprint $table) {
            $table->id('class_student_id'); // Primary Key
            $table->unsignedBigInteger('institute_id');
            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
                        $table->UnsignedBigInteger('class_id'); // Foreign Key (Management)
            $table->UnsignedbigInteger('student_id'); // Foreign Key (Student)
            $table->timestamps(); // Adds created_at and updated_at columns

            // Setting up foreign key constraints
             $table->foreign('class_id')->references('class_id')->on('class')->onDelete('cascade');
             $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_student_mapping');
    }
};
