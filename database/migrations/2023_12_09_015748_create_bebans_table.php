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
        Schema::create('bebans', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nama');
            $table->string('kategori');
            $table->integer('jumlah');
            $table->integer("total_biaya");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebans');
    }
};
