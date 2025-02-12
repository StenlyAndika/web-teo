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
        Schema::create('pelimpahan', function (Blueprint $table) {
            $table->integer('id_pelimpahan')->autoIncrement();
            $table->integer('id_penerimaan_spdp');
            $table->date('tgl_pelimpahan');
            $table->integer('id_wilayah_pelimpahan');
            $table->text('berkas_p16');
            $table->text('berkas_sprint');
            $table->text('berkas_spptbb');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelimpahan');
    }
};
