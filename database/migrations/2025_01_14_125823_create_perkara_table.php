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
        Schema::create('perkara', function (Blueprint $table) {
            $table->integer('id_perkara')->autoIncrement();
            $table->string('no_perkara', 255);
            $table->date('tgl_pendaftaran');
            $table->string('id_kategori', 255);
            $table->string('status', 255);
            $table->integer('id_hakim');
            $table->date('tgl_putusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkara');
    }
};
