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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('id_berkas', 20);
            $table->string('nik', 16);
            $table->string('nip', 20);
            $table->string('keperluan', 100);
            $table->text('keterangan');
            $table->timestamp('tanggal_request')->useCurrent();
            $table->integer('status');
            $table->date('acc');
            $table->string('form_tambahan', 255)->default('0');
            $table->integer('no_urut');
            $table->string('id_kec', 20);
            $table->string('id_desa', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
