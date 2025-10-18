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
        Schema::create('t__apjs', function (Blueprint $table) {


            $table->id(); // no (auto increment)

            // 2. lokasi (nama jalan)
            $table->string('lokasi_nama_jalan');

            // 3. kode / no tiang
            $table->string('kode_tiang')->unique();

            // 4-5. koordinat
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // 6. jenis (Surya / Konven)
            $table->enum('jenis', ['Surya', 'Konvensional'])->nullable();

            // 7. tipe tiang
            $table->string('tipe_tiang')->nullable();

            // 8. kondisi
            $table->string('kondisi')->nullable();

            // 9. tahun pemasangan
            $table->year('tahun_pemasangan')->nullable();

            // 10. lokasi tambahan (misal detail posisi, patokan, dsb)
            $table->string('lokasi_detail')->nullable();

            // 11. keterangan (ketik/isi data)
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t__apjs');
    }
};
