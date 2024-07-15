<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public function logo()
    {
        if ($this->logo && file_exists(public_path('images/banks/' . $this->logo))) {
            return asset('images/banks/' . $this->logo);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteLogo()
    {
        if ($this->logo && file_exists(public_path('images/banks/' . $this->logo))) {
            return unlink(public_path('images/banks/' . $this->logo));
        }
    }
}
