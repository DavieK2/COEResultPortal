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
        Schema::create('result_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_category_id')->constrained( table: 'assessment_categories', column: 'id');
            $table->foreignId('faculty_id')->constrained( table: 'faculties', column: 'id');
            $table->foreignId('department_id')->constrained( table: 'departments', column: 'id');
            $table->foreignId('course_id')->constrained( table: 'courses', column: 'id');
            $table->foreignId('academic_session_id')->constrained( table: 'academic_sessions', column: 'id');
            $table->foreignId('level_id')->constrained( table: 'levels', column: 'id');
            $table->foreignId('semester_id')->constrained( table: 'semesters', column: 'id');
            $table->boolean('is_approved')->default(false);
            $table->text('comments')->nullable();
            $table->string('file_path')->nullable();
            $table->foreignId('submitted_by')->constrained( table: 'users', column: 'id');
            $table->foreignId('approved_by')->nullable()->constrained( table: 'users', column: 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
