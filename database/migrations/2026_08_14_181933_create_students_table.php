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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
              $table->foreignId('user_id')
          ->constrained('users')
          ->cascadeOnDelete();

    $table->foreignId('department_id')
          ->constrained('departments')
          ->cascadeOnDelete();

    $table->foreignId('course_id')
          ->constrained('courses')
          ->cascadeOnDelete();

    $table->string('admission_no', 50)
          ->unique();

    $table->string('roll_no', 50)
          ->unique();

    $table->string('phone', 20);

    $table->enum('gender', [
        'Male',
        'Female',
        'Other'
    ]);

    $table->date('date_of_birth')
          ->nullable();
            $table->timestamps();
            $table->text('address')
          ->nullable();

    $table->date('admission_date')
          ->nullable();

    $table->string('photo')
          ->nullable();

    $table->boolean('status')
          ->default(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
