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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Personal Data
            $table->string('full_name', 255);
            $table->string('photo', 255)->nullable(); // path ke file foto
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('email', 255)->unique();
            $table->string('phone_number', 50);
            $table->text('address');
            $table->string('cv_file', 255)->nullable(); // path file CV
            $table->string('portfolio_file', 255)->nullable(); // path file portfolio

            // Education & Experience
            $table->string('institution')->nullable(); // Institusi pendidikan
            $table->string('major')->nullable(); // Jurusan pendidikan
            $table->integer('graduation_year')->nullable(); // Tahun kelulusan
            $table->string('work_company')->nullable(); // Perusahaan tempat kerja
            $table->string('work_position')->nullable(); // Posisi kerja
            $table->text('work_description')->nullable(); // Deskripsi pekerjaan
            $table->string('soft_skills')->nullable(); // Soft skills
            $table->string('hard_skills')->nullable(); // Hard skills
            $table->string('certification')->nullable(); // Sertifikasi

            // Desired Job
            $table->string('desired_position'); // Posisi pekerjaan yang diinginkan
            $table->string('type_of_work'); // Jenis pekerjaan (Full-time, Part-time, dll)
            $table->string('location'); // Lokasi pekerjaan
            $table->integer('salary_min'); // Gaji minimum
            $table->integer('salary_max'); // Gaji maksimum
            $table->date('availability_date'); // Tanggal ketersediaan
            $table->boolean('available_now')->default(false); // Apakah tersedia sekarang?

            $table->softDeletes();
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
