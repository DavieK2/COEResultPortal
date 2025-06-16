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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('mat_no');
            $table->string('score');
            $table->string('assessment_category')->index();
            $table->string('faculty')->index();
            $table->string('department')->index();
            $table->string('course')->index();
            $table->string('session')->index();
            $table->string('semester')->index();
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
