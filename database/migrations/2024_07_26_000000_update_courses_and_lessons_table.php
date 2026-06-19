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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('category')->nullable();
            $table->decimal('price', 8, 2)->default(0.00);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->string('thumbnail')->nullable();
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->string('video_url')->nullable(); // For YouTube link or file path
            $table->string('pdf_url')->nullable();   // For PDF file path
            $table->string('duration')->nullable();  // e.g., "10:30"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['category', 'price', 'status', 'thumbnail', 'level']);
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['video_url', 'pdf_url', 'duration']);
        });
    }
};
