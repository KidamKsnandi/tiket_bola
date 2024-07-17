<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPertandingan extends Model
{
    use HasFactory;

    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'id_jadwal_pertandingan');
    }

    public function club1()
    {
        return $this->belongsTo(Club::class, 'id_club_1');
    }

    public function club2()
    {
        return $this->belongsTo(Club::class, 'id_club_2');
    }

    public function stadion()
    {
        return $this->belongsTo(Stadion::class, 'id_stadion');
    }
}
