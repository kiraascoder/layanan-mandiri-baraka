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
            $table->foreignId('citizen_id')->constrained()->onDelete('cascade');
            $table->enum('surat_type', ['izin_usaha', 'kelahiran', 'kematian', 'pindah_domisili', 'jaminan_kesehatan']);
            $table->string('no_hp');
            $table->enum('status', ['pending', 'diproses', 'selesai', 'reject'])->default('pending');
            $table->text('alasan_reject')->nullable();
            $table->string('file_surat')->nullable(); // File PDF Surat
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
