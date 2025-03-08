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
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->integer('id_data_siswa')->autoIncrement();
            $table->string('nisn');
            $table->string('nik');
            $table->string('nama');
            $table->string('panggilan');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jekel');
            $table->string('alamat');
            $table->string('asal_sekolah');
            $table->string('no_telp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_siswa');
    }
};
