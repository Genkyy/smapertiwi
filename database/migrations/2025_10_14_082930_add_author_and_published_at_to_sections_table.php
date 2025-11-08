<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            if (!Schema::hasColumn('sections', 'author')) {
                $table->string('author')->nullable()->after('tittle');
            }
            if (!Schema::hasColumn('sections', 'published_at')) {
                $table->date('published_at')->nullable()->after('author');
            }
        });
    }

    public function down(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->dropColumn(['author', 'published_at']);
        });
    }
};
