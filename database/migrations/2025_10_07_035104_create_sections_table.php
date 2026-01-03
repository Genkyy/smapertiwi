<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('thumbnail')->nullable();
            $table->longText('content');
            $table->enum('post_as', ['Artikel', 'Pengumuman', 'Berita'])->nullable();
            $table->date('published_at')->nullable();
            $table->string('author')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
