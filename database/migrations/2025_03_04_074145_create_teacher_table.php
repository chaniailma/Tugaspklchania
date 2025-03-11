<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) { 
            $table->id(); // Primary key
            $table->string('name');
            $table->string('email')->unique(); // Email harus unik
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('photo')->nullable(); // Menyimpan path foto
            $table->text('detail')->nullable(); // Informasi tambahan tentang guru
            $table->timestamps(); // created_at, updated_at
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
