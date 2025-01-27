<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistsTableSeeder extends Seeder
{
    public function run(): void
    {
        Artist::create([
            'name' => 'Vincent van Gogh',
            'date_of_birth' => '1853-03-30',
            'description' => 'Hollandczyk urodzony w Groot-Zundert, umieszczany w nurcie postimpresjonistycznym.',
            'artist_img' => 'images/vincent_van_gogh.jpg',
        ]);

        Artist::create([
            'name' => 'Pablo Picasso',
            'date_of_birth' => '1881-10-25',
            'description' => 'Hiszpański malarz, rzeźbiarz, grafik, ceramik i scenograf, jeden z najważniejszych przedstawicieli sztuki XX wieku.',
            'artist_img' => 'images/pablo_picasso.jpg',
        ]);

        Artist::create([
            'name' => 'Leonardo da Vinci',
            'date_of_birth' => '1452-04-15',
            'description' => 'Włoski artysta, renesansowy malarz, rzeźbiarz, architekt, wynalazca, inżynier, pisarz i filozof.',
            'artist_img' => 'images/leonardo_da_vinci.jpg',
        ]);
    }
}

