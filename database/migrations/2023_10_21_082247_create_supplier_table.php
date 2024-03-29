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
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
          
            $table->string('nama')->unique();
            $table->string('telp');
            $table->text('alamat');
            $table->float('kecpengiriman');
            $table->float('tdiskon');
            $table->float('pelayanan');
            $table->float('garansi');
            // $table->float('keaslian');
            $table->float('tpembayaran');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
