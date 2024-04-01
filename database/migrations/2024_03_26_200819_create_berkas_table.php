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
        Schema::create('berkas', function (Blueprint $table) {
            $table->id('id_berkas');
            $table->string('judul_berkas', 255);
            $table->string('kode_berkas', 10);
            $table->string('kode_belakang', 10);
            $table->text('template');
            $table->string('form_tambahan', 255)->default('0');
            $table->string('desa', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};