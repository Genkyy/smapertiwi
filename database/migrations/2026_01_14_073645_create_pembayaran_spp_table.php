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
    Schema::create('pembayaran_spp', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('tagihan_spp_id');

    $table->foreign('tagihan_spp_id')
        ->references('id')
        ->on('tagihan_spp')
        ->cascadeOnDelete();

    $table->string('invoice')->unique();
    $table->integer('amount');

    $table->enum('method', ['cash', 'transfer', 'manual'])
        ->default('manual');

    $table->string('proof')->nullable();

    $table->enum('status', ['pending', 'verified', 'rejected'])
        ->default('pending');

    $table->timestamp('paid_at')->nullable();

    $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_spp');
    }
};
