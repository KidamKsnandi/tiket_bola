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
        Schema::create('jadwal_pertandingans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_club_1')->unsigned();
            $table->bigInteger('id_club_2')->unsigned();
            $table->string('slug');
            $table->string('keterangan');
            $table->date('tanggal_tanding');
            $table->bigInteger('id_stadion')->unsigned();
            $table->timestamps();
            $table->foreign('id_club_1')->references('id')->on('clubs');
            $table->foreign('id_club_2')->references('id')->on('clubs');
            $table->foreign('id_stadion')->references('id')->on('stadions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pertandingans');
    }
};
