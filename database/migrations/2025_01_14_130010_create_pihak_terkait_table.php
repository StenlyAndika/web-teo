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
        Schema::create('pihak_terkait', function (Blueprint $table) {
            $table->integer('id_pihak_terkait')->autoIncrement();
            $table->integer('id_perkara');
            $table->string('nama_pihak', 255);
            $table->string('alamat', 255);
            $table->string('tipe_pihak', 255);
            $table->string('no_hp', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pihak_terkait');
    }
};
