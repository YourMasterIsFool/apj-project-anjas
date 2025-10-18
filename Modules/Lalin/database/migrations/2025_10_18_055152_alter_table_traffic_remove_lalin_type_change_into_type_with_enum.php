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
        Schema::table(
            't_traffic',
            function (Blueprint $table) {
                $table->dropForeign(["lalin_type_id"]);
                $table->dropColumn(["lalin_type_id"]);
                $table->enum("type", ["traffic", "warning"]);
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create(
            't_traffic',
            function (Blueprint $table) {
                $table->unsignedBigInteger("lalin_type_id");
                $table->foreign('lalin_type_id')
                    ->references('id')
                    ->on('t_lalin_types')
                    ->onDelete('cascade');
                $table->dropColumn("type");
            }
        );
    }
};
