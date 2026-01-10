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
        Schema::create('nilai_rapor', function (Blueprint $table) {
    $table->id();

    $table->foreignId('student_id')->constrained()->cascadeOnDelete();
    $table->string('semester'); // Ganjil / Genap
    $table->string('tahun_ajaran');

    // ===== MAPEL =====
    $table->integer('pai');
    $table->integer('ppkn');
    $table->integer('bahasa_indonesia');
    $table->integer('matematika');
    $table->integer('bahasa_inggris');
    $table->integer('sejarah');
    $table->integer('informatika');
    $table->integer('pjok');

    // ===== PENGEMBANGAN DIRI =====
    $table->string('pramuka')->nullable();
    $table->string('osis')->nullable();
    $table->string('ekskul')->nullable();

    // ===== AKHLAK & KEPRIBADIAN =====
    $table->enum('disiplin', ['SB', 'B', 'C', 'K']);
    $table->enum('tanggung_jawab', ['SB', 'B', 'C', 'K']);
    $table->enum('sopan_santun', ['SB', 'B', 'C', 'K']);

    // ===== KETIDAKHADIRAN =====
    $table->integer('sakit')->default(0);
    $table->integer('izin')->default(0);
    $table->integer('alpha')->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_rapor');
    }
};
