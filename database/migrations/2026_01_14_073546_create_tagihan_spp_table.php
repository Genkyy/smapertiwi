<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tagihan_spp', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('bulan');
            $table->string('tahun_ajaran');
            $table->integer('nominal');

            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');

            $table->date('jatuh_tempo')->nullable();

            $table->timestamps();

            $table->unique(['student_id', 'bulan', 'tahun_ajaran']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagihan_spp');
    }
};
