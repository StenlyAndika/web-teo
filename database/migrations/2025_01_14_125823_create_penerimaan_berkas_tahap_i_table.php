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
        Schema::create('penerimaan_berkas_tahap_i', function (Blueprint $table) {
            $table->integer('id_penerimaan_berkas_tahap_i')->autoIncrement();
            $table->integer('id_penerimaan_spdp');
            $table->string('no_p16');
            $table->date('tgl_p16');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_berkas_tahap_i');
    }
};
