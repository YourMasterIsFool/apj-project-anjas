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


            // 3. kode / no tiang
            $table->string('kode_tiang')->unique();

            // 4-5. koordinat
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            // 6. jenis (Surya / Konven)
            $table->enum('jenis', ['Surya', 'Konvensional'])->nullable();

            // 7. tipe tiang
            $table->string('tipe_tiang')->nullable();

            // 8. kondisi
            $table->enum('lokasi', ["kiri", "tengah", "kanan"])->nullable();
            $table->enum('kondisi', ["baik", "rusak", "hilang"])->nullable();


            // 9. tahun pemasangan
            $table->year('tahun_pemasangan')->nullable();

            // 10. lokasi tambahan (misal detail posisi, patokan, dsb)
            $table->string('lokasi_detail')->nullable();

            // 11. keterangan (ketik/isi data)
            $table->text('keterangan')->nullable();

            $table->unsignedBigInteger('jalan_id');
            $table->foreign("jalan_id")->references("id")->on('t_jalans')->onDelete("cascade");
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
