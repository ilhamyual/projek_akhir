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
        Schema::create('data_pejabats', function (Blueprint $table) {
            $table->id();
            $table->integer('nip')->unsigned();
            $table->string('nm_pejabat', 100);
            $table->string('jabatan', 50);
            $table->string('pangkat', 50);
            $table->string('id_desa', 20);
            $table->string('id_kec', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pejabats');
    }
};
