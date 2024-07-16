<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public function gambar()
    {
        if ($this->gambar && file_exists(public_path('images/banners/' . $this->gambar))) {
            return asset('images/banners/' . $this->gambar);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deletegambar()
    {
        if ($this->gambar && file_exists(public_path('images/banners/' . $this->gambar))) {
            return unlink(public_path('images/banners/' . $this->gambar));
        }
    }
}
