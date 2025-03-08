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
        Schema::create('data_ibu', function (Blueprint $table) {
            $table->integer('id_data_ibu')->autoIncrement();
            $table->integer('id_data_siswa');
            $table->string('nik');
            $table->string('nama');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('no_telp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ibu');
    }
};
