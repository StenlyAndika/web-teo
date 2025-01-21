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
        Schema::create('jaksa', function (Blueprint $table) {
            $table->integer('id_jaksa')->autoIncrement();
            $table->text('nip');
            $table->text('nama');
            $table->text('alamat');
            $table->text('email');
            $table->text('notelp');
            $table->text('pangkat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jaksa');
    }
};
