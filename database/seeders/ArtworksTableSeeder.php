<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artwork;
use App\Models\Artist;

class ArtworksTableSeeder extends Seeder
{
    public function run(): void
    {
        $vangogh = Artist::where('name', 'Vincent van Gogh')->first();
        $picasso = Artist::where('name', 'Pablo Picasso')->first();
        $davinci = Artist::where('name', 'Leonardo da Vinci')->first();

        Artwork::create([
            'artist_id' => $vangogh->id,
            'title' => 'Starry Night',
            'description' => 'A famous painting by Vincent van Gogh...',
            'price' => 5000.00,
            'artwork_img' => 'images/obraz1.jpg',
        ]);

        Artwork::create([
            'artist_id' => $picasso->id,
            'title' => 'Guernica',
            'description' => 'A famous painting by Pablo Picasso...',
            'price' => 10000.00,
            'artwork_img' => 'images/obraz2.jpg',
        ]);

        Artwork::create([
            'artist_id' => $davinci->id,
            'title' => 'Mona Lisa',
            'description' => 'A famous painting by Leonardo da Vinci...',
            'price' => 15000.00,
            'artwork_img' => 'images/obraz3.jpg',
        ]);

    }
}
