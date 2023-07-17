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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('other_names')->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->text('residential_address');
            $table->text('permanent_address');
            $table->string('fathers_name')->nullable();
            $table->string('fathers_phone')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mothers_phone')->nullable();
            $table->string('guardians_name')->nullable();
            $table->string('guardians_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
