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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();  // Kolom id yang auto-increment dan primary key
            $table->string('name', 255);  // Kolom name yang tidak boleh null
            $table->string('email', 255)->unique();  // Kolom email yang tidak boleh null dan harus unik
            $table->string('password', 255);  // Kolom password yang digunakan untuk autentikasi
            $table->text('address')->nullable();  // Kolom address yang bisa kosong
            $table->string('industry', 100)->nullable();  // Kolom industry dengan panjang 100 karakter dan bisa kosong
            $table->softDeletes();
            $table->timestamps(0);  // Kolom created_at dan updated_at dengan format timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
