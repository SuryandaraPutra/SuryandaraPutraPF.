<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('Web App'); // e.g. UI/UX, Machine Learning, Web App
            $table->string('role')->nullable(); // e.g. Ketua Kelompok, Frontend Dev
            $table->string('period')->nullable(); // e.g. Juli 2026
            $table->text('summary');
            $table->text('problem_statement')->nullable();
            $table->text('solution')->nullable();
            $table->json('key_features')->nullable();
            $table->json('tech_stack')->nullable(); // array of strings
            $table->string('demo_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
