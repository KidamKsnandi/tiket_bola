<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    public function jadwal_pertandingan()
    {
        return $this->belongsTo(JadwalPertandingan::class, 'id_jadwal_pertandingan');
    }
}
