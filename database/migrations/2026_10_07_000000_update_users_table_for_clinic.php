<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $hasName = Schema::hasColumn('users', 'name');
        $hasNama = Schema::hasColumn('users', 'nama');
        $hasRole = Schema::hasColumn('users', 'role');
        $hasAlamat = Schema::hasColumn('users', 'alamat');
        $hasNoKtp = Schema::hasColumn('users', 'no_ktp');
        $hasNoHp = Schema::hasColumn('users', 'no_hp');
        $hasNoRm = Schema::hasColumn('users', 'no_rm');

        Schema::table('users', function (Blueprint $table) use (
            $hasName,
            $hasNama,
            $hasRole,
            $hasAlamat,
            $hasNoKtp,
            $hasNoHp,
            $hasNoRm
        ) {
            if ($hasName && $hasNama) {
                $table->dropColumn('name');
            } elseif ($hasName) {
                $table->renameColumn('name', 'nama');
            } elseif (!$hasNama) {
                $table->string('nama');
            }

            if (!$hasRole) {
                $table->string('role')->default('pasien');
            }

            if (!$hasAlamat) {
                $table->text('alamat')->nullable();
            }

            if (!$hasNoKtp) {
                $table->string('no_ktp')->nullable()->unique();
            }

            if (!$hasNoHp) {
                $table->string('no_hp')->nullable();
            }

            if (!$hasNoRm) {
                $table->string('no_rm')->nullable()->unique();
            }
        });
    }

    public function down(): void
    {
        $hasName = Schema::hasColumn('users', 'name');

        Schema::table('users', function (Blueprint $table) use ($hasName) {
            $table->dropUnique(['no_ktp']);
            $table->dropUnique(['no_rm']);
            $table->dropColumn(['alamat', 'no_ktp', 'no_hp', 'no_rm']);

            if (!$hasName) {
                $table->string('name')->nullable();
            }
        });
    }
};