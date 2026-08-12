<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. Volunteer Crew Event, Magang
            $table->string('organization'); // e.g. BCA Expoversary, Toko Lareeza Fashion
            $table->string('role_type')->default('Volunteer'); // Volunteer, Magang, Work, Organization
            $table->string('period'); // e.g. Februari 2026
            $table->json('bullets'); // array of bullet points
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
