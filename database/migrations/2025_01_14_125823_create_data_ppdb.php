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
        Schema::create('data_ppdb', function (Blueprint $table) {
            $table->integer('id_data_ppdb')->autoIncrement();
            $table->integer('id_data_siswa');
            $table->string('upload_kk');
            $table->string('upload_akta');
            $table->string('upload_ijazah');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ppdb');
    }
};
