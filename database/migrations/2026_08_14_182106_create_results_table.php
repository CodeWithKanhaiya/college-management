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
            $table->foreignId('student_id')
          ->constrained('students')
          ->cascadeOnDelete();

    $table->foreignId('exam_id')
          ->constrained('exams')
          ->cascadeOnDelete();

    $table->foreignId('subject_id')
          ->constrained('subjects')
          ->cascadeOnDelete();

    $table->decimal('marks_obtained', 5, 2);

    $table->decimal('total_marks', 5, 2);

    $table->string('grade', 5)
          ->nullable();

    $table->string('remarks')
          ->nullable();

            $table->timestamps();
             $table->unique([
        'student_id',
        'exam_id',
        'subject_id'
    ]);
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
