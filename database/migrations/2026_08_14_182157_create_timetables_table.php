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
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
          ->constrained('courses')
          ->cascadeOnDelete();

    $table->foreignId('subject_id')
          ->constrained('subjects')
          ->cascadeOnDelete();

    $table->foreignId('teacher_id')
          ->constrained('teachers')
          ->cascadeOnDelete();

    $table->enum('day', [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ]);

    $table->time('start_time');

    $table->time('end_time');

    $table->string('room_no', 40)
          ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
