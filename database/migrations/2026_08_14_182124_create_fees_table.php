
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
        Schema::create('fees', function (Blueprint $table) {

            $table->id();

            // Student
            $table->foreignId('student_id')
                  ->constrained('students')
                  ->cascadeOnDelete();

            // Course
            $table->foreignId('course_id')
                  ->constrained('courses')
                  ->cascadeOnDelete();

            // Fee Amount
            $table->decimal('total_amount', 10, 2);

            $table->decimal('paid_amount', 10, 2)
                  ->default(0);

            $table->decimal('due_amount', 10, 2)
                  ->default(0);

            // Status
            $table->enum('status', [
                'paid',
                'partial',
                'pending'
            ])->default('pending');

            // Due Date
            $table->date('due_date')
                  ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
