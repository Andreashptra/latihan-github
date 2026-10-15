<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'id_poli')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('id_poli')->nullable()->constrained('poli')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'id_poli')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropConstrainedForeignId('id_poli');
            });
        }
    }
};