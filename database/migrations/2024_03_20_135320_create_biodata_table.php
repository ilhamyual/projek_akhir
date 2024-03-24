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
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->enum('jekel', ['Laki-Laki', 'Perempuan']);
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('kota');
            $table->date('tgl_lahir');
            $table->string('password');
            $table->enum('role', ['Pemohon', 'Admin Master', 'Admin Desa'])->default('Pemohon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata');
    }
};
