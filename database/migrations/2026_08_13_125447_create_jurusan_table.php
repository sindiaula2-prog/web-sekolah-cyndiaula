<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('jurusans', function (Blueprint $table) {
    $table->id();
    $table->string('kode')->unique();
    $table->string('singkatan')->nullable(); // TAMBAHKAN INI
    $table->string('nama_jurusan');
    $table->text('deskripsi')->nullable();
    $table->string('logo')->nullable();
    $table->json('kompetensi')->nullable();
    $table->json('prospek_karir')->nullable();
    $table->string('kaprodi_nama')->nullable();
    $table->string('kaprodi_gelar')->nullable();
    $table->string('kaprodi_foto')->nullable();
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};