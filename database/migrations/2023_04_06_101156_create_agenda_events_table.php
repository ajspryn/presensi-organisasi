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
        Schema::create('agenda_events', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('event_id');
            $table->string('kelompok_id')->nullable();
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->string('tanggal');
            $table->string('jam_mulai');
            $table->string('jam_berakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_events');
    }
};
