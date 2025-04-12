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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();  // Kolom id yang auto-increment dan primary key
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');  // Kolom company_id yang merujuk ke tabel companies
            $table->string('title', 255);  // Kolom title yang tidak boleh null
            $table->text('description')->nullable();  // Kolom description yang bisa kosong
            $table->string('type_of_work', 100)->nullable();  // Kolom type_of_work (fulltime/parttime/internship) yang bisa kosong
            $table->string('location', 100)->nullable();  // Kolom location yang bisa kosong
            $table->integer('gaji_min')->nullable();  // Kolom gaji_min yang bisa kosong
            $table->integer('gaji_max')->nullable();  // Kolom gaji_max yang bisa kosong
            $table->string('bidang', 100)->nullable();  // Kolom bidang pekerjaan yang bisa kosong
            $table->date('availability_date')->nullable();  // Kolom availability_date yang bisa kosong
            $table->boolean('available_now')->default(false);  // Kolom available_now dengan nilai default false
            $table->softDeletes();
            $table->timestamps(0);  // Kolom created_at dan updated_at dengan format timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
