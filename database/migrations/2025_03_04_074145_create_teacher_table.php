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
        Schema::create('teacher', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->string('email'); // Email harus unik
            $table->string('phone');
            $table->string('address');
            $table->enum('gender', ['male', 'female']); // Menggunakan ENUM
            $table->enum('status', ['active', 'inactive'])->default('active'); // ENUM dengan default value
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher');
    }
};
