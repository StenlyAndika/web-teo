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
        Schema::create('pengacara', function (Blueprint $table) {
            $table->integer('id_pengacara')->autoIncrement();
            $table->string('nama_pengacara', 255);
            $table->string('no_telp', 255);
            $table->string('alamat', 255);
            $table->string('email', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengacara');
    }
};
