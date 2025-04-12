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
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();  // Kolom id yang auto-increment dan primary key
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->string('file', 255);  // Kolom path file sertifikat
            $table->softDeletes();
            $table->timestamps(0);  // Untuk created_at dan updated_at, dengan default timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
