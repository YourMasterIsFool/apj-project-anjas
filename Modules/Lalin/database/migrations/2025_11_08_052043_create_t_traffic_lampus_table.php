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
        Schema::create('t_traffic_lampus', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['merah', 'hijau', 'kuning'])->nullable();
            $table->integer('durasi')->nullable();
            $table->unsignedBigInteger("traffic_id")->nullable();
            $table->foreign('traffic_id')->references('id')->on('t_traffic')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_traffic_lampus');
    }
};
