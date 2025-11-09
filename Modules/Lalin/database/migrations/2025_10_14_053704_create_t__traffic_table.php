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
        Schema::create('t_traffic', function (Blueprint $table) {
            $table->id(); // no (auto increment)

            $table->string('kode')->unique(); // kode unik tiap simpang
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->string('jenis_simpang')->nullable();
            $table->year('tahun_pemasangan')->nullable();
            $table->string('tipe_tiang')->nullable();
            $table->integer('pengaturan_fase')->nullable();
            // durasi dalam menit/kali/hari, bisa pakai string agar fleksibel
            // $table->string('durasi')->nullable();

            $table->text('keterangan')->nullable();

            $table->enum('lokasi', ["kiri", "tengah", "kanan"])->nullable();
            $table->enum('kondisi', ["baik", "rusak", "hilang"])->nullable();
            $table->enum("type", ["traffic", "warning"]);
            $table->unsignedBigInteger('jalan_id');
            $table->foreign('jalan_id')->references('id')->on('t_jalans')->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t__traffic');
    }
};
