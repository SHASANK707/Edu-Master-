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
        Schema::create('parent_student_relation', function (Blueprint $table) {
            $table->increments('psid');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('institute_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
            // Define foreign keys
            //  
            $table->foreign('parent_id')->references('parent_id')->on('parent')->onDelete('cascade');
            $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade');
            $table->timestamps();
         });
     } 
       

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_student_relation');
    }
};
