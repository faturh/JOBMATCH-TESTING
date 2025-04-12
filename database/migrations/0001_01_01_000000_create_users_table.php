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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['employee', 'company'])->default('employee'); // Peran antara employee atau company
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabel untuk employee data (applicant)
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('full_name', 255);
            $table->string('photo')->nullable(); // path ke file foto
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('email', 255)->unique();
            $table->string('phone_number', 50);
            $table->text('address');
            $table->string('cv_file', 255)->nullable(); // path file
            $table->string('portfolio_file', 255)->nullable(); // path file
            $table->string('desired_position', 255);
            $table->string('type_of_work', 100);
            $table->string('location', 100);
            $table->integer('salary_min');
            $table->integer('salary_max');
            $table->date('availability_date');
            $table->boolean('available_now')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });

        // Tabel untuk company data
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('logo')->nullable(); // path ke file logo
            $table->string('company_name');
            $table->string('company_address');
            $table->string('website_address');
            $table->string('company_email');
            $table->string('company_phone_number');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
