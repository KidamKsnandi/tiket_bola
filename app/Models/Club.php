<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'logo'];

    public function logo()
    {
        if ($this->logo && file_exists(public_path('images/clubs/' . $this->logo))) {
            return asset('images/clubs/' . $this->logo);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteLogo()
    {
        if ($this->logo && file_exists(public_path('images/clubs/' . $this->logo))) {
            return unlink(public_path('images/clubs/' . $this->logo));
        }
    }
}
