<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution'); // Universitas Bina Sarana Informatika — Kampus Margonda
            $table->string('degree_major'); // S1 Teknologi Informasi, Fakultas Teknik dan Informatika
            $table->string('period'); // 2023 – Sekarang
            $table->string('score')->nullable(); // IPK 3.84/4.00 or Nilai rata-rata 93
            $table->json('details')->nullable(); // Relevant courses / notes
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
