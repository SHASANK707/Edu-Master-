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
        Schema::create('faculty_info', function (Blueprint $table) {
            $table->id('faculty_id'); // Primary Key
            $table->unsignedBigInteger('institute_id');
            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
                        $table->string('faculty_name', 100);
            // $table->integer('faculty_age');
            $table->date('faculty_dob');
            $table->enum('faculty_gender', ['Male', 'Female', 'Other']);
            $table->string('faculty_contact', 11);
            $table->string('faculty_address', 100);
            $table->string('faculty_email', 100);
            $table->string('faculty_qualification', 100);
            $table->date('faculty_doj');
            $table->string('faculty_specializations', 100);
            $table->string('faculty_experience', 255);
            $table->string('faculty_designation', 100);
            $table->string('faculty_department', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_info');
    }
};
