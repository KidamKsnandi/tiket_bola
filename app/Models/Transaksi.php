<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }

    public function buktiBayar()
    {
        if ($this->bukti_bayar && file_exists(public_path('images/bukti_bayar/' . $this->bukti_bayar))) {
            return asset('images/bukti_bayar/' . $this->bukti_bayar);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteBuktiBayar()
    {
        if ($this->bukti_bayar && file_exists(public_path('images/bukti_bayar/' . $this->bukti_bayar))) {
            return unlink(public_path('images/bukti_bayar/' . $this->bukti_bayar));
        }
    }
}
