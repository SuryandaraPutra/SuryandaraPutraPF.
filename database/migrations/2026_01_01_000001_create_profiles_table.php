<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('about_me');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->string('gpa')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('cv_pdf_path')->nullable();
            $table->json('social_links')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
