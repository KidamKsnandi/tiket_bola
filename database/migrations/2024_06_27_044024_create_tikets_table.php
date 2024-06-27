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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jadwal_pertandingan')->unsigned();
            $table->string('nama_tiket');
            $table->string('tribun');
            $table->integer('kuota');
            $table->bigInteger('harga');
            $table->timestamps();
            $table->foreign('id_jadwal_pertandingan')->references('id')->on('jadwal_pertandingans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
