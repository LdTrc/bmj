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
        Schema::create('datasupp', function (Blueprint $table) {
            $table->id();
            $table->string('namasupp', 30);
            $table->string('notelp', 30);
            $table->text('alamat');
            $table->string('kota', 20);
            $table->string('lokasi', 20);
            $table->float('pengiriman');
            $table->float('diskon');
            $table->float('garansi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasupp');
    }
};
