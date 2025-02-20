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
        Schema::create('berita_acara_pelimpahan', function (Blueprint $table) {
            $table->integer('id_berita_acara_pelimpahan')->autoIncrement();
            $table->integer('id_penerimaan_spdp');
            $table->text('no_p31');
            $table->text('jenis_tahanan');
            $table->date('tgl_penahanan_dari');
            $table->date('tgl_penahanan_hingga');
            $table->text('lokasi_penahanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acara_pelimpahan');
    }
};
