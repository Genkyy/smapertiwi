<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_pelajarans', function (Blueprint $table) {
            $table->id();

            // Kelas
            $table->string('kelas', 10); // XA, XB, XI, XII

            // Hari & Jam
            $table->enum('hari', [
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
            ]);

            $table->time('jam_mulai');
            $table->time('jam_selesai');

            // Informasi Pelajaran
            $table->string('mata_pelajaran');
            $table->string('guru');
            $table->string('ruang')->nullable();

            $table->timestamps();

            // Index untuk performa filter
            $table->index(['kelas', 'hari']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelajarans');
    }
};
