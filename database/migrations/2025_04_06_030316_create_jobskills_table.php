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
        Schema::create('jobskills', function (Blueprint $table) {
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');  // Kolom job_id yang merujuk ke tabel jobs
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade');  // Kolom skill_id yang merujuk ke tabel skills
            $table->primary(['job_id', 'skill_id']);  // Primary key gabungan dari job_id dan skill_id
            $table->softDeletes();
            $table->timestamps(0);  // Kolom created_at dan updated_at dengan format timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobskills');
    }
};
