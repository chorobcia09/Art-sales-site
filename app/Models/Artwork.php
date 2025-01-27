<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = ['artist_id', 'title', 'description', 'price', 'artwork_img'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
