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
            $table->integer('id_data_siswa')->nullable();
            $table->string('upload_kk')->nullable();
            $table->string('upload_akta')->nullable();
            $table->string('upload_ijazah')->nullable();
            $table->integer('status')->nullable();
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
