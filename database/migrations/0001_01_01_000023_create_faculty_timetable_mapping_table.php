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
        Schema::create('faculty_timetable_mapping', function (Blueprint $table) {
            $table->id('faculty_timetable_id'); // Primary Key
            $table->unsignedBigInteger('institute_id');
            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
            $table->unsignedBigInteger('faculty_id'); // Foreign Key (Faculty)
            $table->unsignedBigInteger('timetable_id'); // Foreign Key (Management)
            $table->timestamps(); // Adds created_at and updated_at columns

            // Setting up foreign key constraints
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty_info')->onDelete('cascade');
            $table->foreign('timetable_id')->references('time_table_id')->on('faculty_timetable')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_timetable_mapping');
    }
};
