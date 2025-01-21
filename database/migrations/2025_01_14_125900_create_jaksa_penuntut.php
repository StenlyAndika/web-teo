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
        Schema::create('jaksa_penuntut', function (Blueprint $table) {
            $table->integer('id_jaksa_penuntut')->autoIncrement();
            $table->text('no_spdp');
            $table->text('id_jaksa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jaksa_penuntut');
    }
};
