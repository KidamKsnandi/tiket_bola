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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_tiket')->unsigned();
            $table->string('no_invoice');
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('bukti_bayar');
            $table->boolean('status');
            $table->date('tanggal_transaksi');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_tiket')->references('id')->on('tikets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
