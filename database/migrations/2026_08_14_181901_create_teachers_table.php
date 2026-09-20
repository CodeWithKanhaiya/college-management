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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')
          ->constrained('users')
          ->cascadeOnDelete();

    $table->foreignId('department_id')
          ->constrained('departments')
          ->cascadeOnDelete();

    $table->string('employee_id', 50)
          ->unique();

    $table->string('phone', 20);

    $table->string('qualification')
          ->nullable();

    $table->string('designation', 100)
          ->nullable();

    $table->date('joining_date')
          ->nullable();

    $table->text('address')
          ->nullable();

    $table->string('photo')
          ->nullable();

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
        Schema::dropIfExists('teachers');
    }
};
