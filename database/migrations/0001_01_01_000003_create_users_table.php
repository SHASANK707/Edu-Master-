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
    Schema::create('users', function (Blueprint $table) {
        $table->id(); // This automatically creates an 'id' column as the primary key
        $table->unsignedBigInteger('institute_id');
        $table->string('role');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->timestamp('email_verified_at')->nullable(); // Add this field
        $table->foreign('institute_id')->references('institute_id')->on('institute')->onDelete('cascade');
        $table->timestamps();
        
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
