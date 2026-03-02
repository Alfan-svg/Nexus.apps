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
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
            $table->integer('kuota');
            $table->string('poster')->nullable(); // path file poster
            $table->timestamps(); // create_at & update_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas');
    }
};
