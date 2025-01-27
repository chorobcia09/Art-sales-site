<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }

    protected $fillable = ['name', 'date_of_birth', 'description', 'artist_img'];
}


