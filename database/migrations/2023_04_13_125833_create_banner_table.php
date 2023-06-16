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
        Schema::create('banner', function (Blueprint $table) {
            $table->id('banner_id');
            $table->foreignId('organisasi_id');
            $table->string('nama', 128);
            $table->string('gambar', 128);
            $table->integer('urutan');
            $table->text('deskripsi');
            $table->enum('status', ['aktif', 'tidak_aktif']);
            $table->timestamps();

            $table->foreign('organisasi_id')->references('organisasi_id')->on('organisasi')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner');
    }
};
