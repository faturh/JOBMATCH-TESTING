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
        Schema::create('education', function (Blueprint $table) {
            $table->id();  // kolom id yang auto-increment dan primary key
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->string('institution', 255);
            $table->string('major', 255);
            $table->year('graduation_year');
            $table->softDeletes();
            $table->timestamps(0);  // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
