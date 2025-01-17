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
        Schema::create('catatan_perkara', function (Blueprint $table) {
            $table->integer('id_catatan')->autoIncrement();
            $table->integer('id_perkara');
            $table->integer('id_jaksa');
            $table->date('tgl_catatan');
            $table->text('isi_catatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_perkara');
    }
};
