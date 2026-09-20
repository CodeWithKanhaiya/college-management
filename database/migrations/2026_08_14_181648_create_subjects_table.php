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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
                $table->foreignId('course_id')
          ->constrained('courses')
          ->cascadeOnDelete();

    $table->string('name', 150);

    $table->string('code', 50);

    $table->unsignedTinyInteger('semester');

    $table->unsignedTinyInteger('credits')
          ->default(0);

    $table->boolean('status')
          ->default(true);
            $table->timestamps();
            $table->unique(['course_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
