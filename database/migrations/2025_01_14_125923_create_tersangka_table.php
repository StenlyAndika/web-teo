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
        Schema::create('tersangka', function (Blueprint $table) {
            $table->integer('id_tersangka')->autoIncrement();
            $table->text('nama');
            $table->text('alamat');
            $table->text('tempat_lahir');
            $table->date('tgl_lahir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tersangka');
    }
};
