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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
             $table->string('name', 150);

    $table->enum('exam_type', [
        'Internal',
        'Mid Term',
        'Practical',
        'Final'
    ]);

    $table->unsignedTinyInteger('semester');

    $table->date('start_date');

    $table->date('end_date');

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
        Schema::dropIfExists('exams');
    }
};
