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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelurahan_id')->constrained()->onDelete('cascade'); // Relasi ke kelurahan
            $table->foreignId('citizen_id')->constrained()->onDelete('cascade'); // Relasi ke citizen
            $table->enum('jenis_surat', ['izin_usaha', 'kelahiran', 'kematian', 'pindah_domisili', 'jaminan_kesehatan']);
            $table->string('no_surat')->unique()->nullable();
            $table->json('data_surat')->nullable();
            $table->string('no_hp'); // Gunakan string untuk nomor HP
            $table->json('file_persyaratan')->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai'])->default('pending');
            $table->string('surat_selesai')->nullable(); // Menghapus ->after()
            $table->text('alasan_reject')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
