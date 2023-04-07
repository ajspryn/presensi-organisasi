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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('organisasi_id');
            $table->string('kelompok_id')->nullable();
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->string('tgl_event');
            $table->string('alamat');
            $table->string('flayer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
