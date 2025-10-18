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
        Schema::create('t_jalans', function (Blueprint $table) {
            $table->id();

            $table->string('kode_jalan');
            $table->string("nama_jalan");
            $table->integer("panjang_jalan");
            $table->string("kelas_jalan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_jalans');
    }
};
