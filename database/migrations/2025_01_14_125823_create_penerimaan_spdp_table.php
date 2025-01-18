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
        Schema::create('penerimaan_spdp', function (Blueprint $table) {
            $table->integer('id_penerimaan_spdp')->autoIncrement();
            $table->integer('id_instansi_penyidik');
            $table->integer('id_instansi_pelaksana');
            $table->text('no_sprindik');
            $table->date('tgl_sprindik');
            $table->text('no_spdp');
            $table->date('tgl_spdp');
            $table->text('diterima_wilayah_kerja');
            $table->date('tgl_diterima');
            $table->text('waktu_kejadian');
            $table->date('tgl_kejadian');
            $table->text('tempat_kejadian_perkara');
            $table->text('uraian_singkat_perkara');
            $table->text('undang_undang_dan_pasal');
            $table->text('jenis_pidana');
            $table->text('jenis_perkara');
            $table->text('berkas_spdp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_spdp');
    }
};
