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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
          ->constrained('courses')
          ->cascadeOnDelete();

    $table->string('name', 100);

    $table->string('section', 50);

    $table->unsignedTinyInteger('semester');

    $table->string('academic_year', 20);

    $table->boolean('status')
          ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
