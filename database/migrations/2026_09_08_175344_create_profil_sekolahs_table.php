<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();

            $table->string('judul')
                ->default('Profil SMK Negeri 1 Cijati');

            $table->longText('tentang')
                ->nullable();

            $table->longText('sejarah')
                ->nullable();

            $table->longText('visi_misi')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Membatalkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};