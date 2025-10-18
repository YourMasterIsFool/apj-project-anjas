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

            $table->string('lokasi'); // nama jalan
            $table->string('kode')->unique(); // kode unik tiap simpang
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->string('jenis_simpang')->nullable();
            $table->year('tahun_pemasangan')->nullable();
            $table->string('tipe_tiang')->nullable();
            $table->string('pengaturan_fase')->nullable();

            // durasi dalam menit/kali/hari, bisa pakai string agar fleksibel
            $table->string('durasi')->nullable();

            $table->string('kondisi')->nullable();
            $table->text('keterangan')->nullable();

            $table->unsignedBigInteger("lalin_type_id");
            $table->foreign('lalin_type_id')
                ->references('id')
                ->on('t_lalin_types')
                ->onDelete('cascade');

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
