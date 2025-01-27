<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;
use App\Models\Artist;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::paginate(10);
        return view('artworks.index', compact('artworks'));
    }

    public function create()
    {
        $artists = Artist::all();
        return view('artworks.create', compact('artists'));
    }
    
    

    public function edit(Artwork $artwork)
    {
        $artists = Artist::all();
        return view('artworks.edit', compact('artwork', 'artists'));
    }
    

    public function update(Request $request, Artwork $artwork)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'artist_id' => 'required|exists:artists,id',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $artwork->artwork_img = 'images/' . $imageName;
        }

        $artwork->title = $validatedData['title'];
        $artwork->description = $validatedData['description'];
        $artwork->price = $validatedData['price'];
        $artwork->artist_id = $validatedData['artist_id'];
        $artwork->save();

        return redirect()->route('artworks.index')->with('success', 'Dzieło sztuki zostało zaktualizowane pomyślnie.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'artist_id' => 'nullable|exists:artists,id',
            'artist_name' => 'nullable|string|max:255',
        ]);
    
        if (!$validatedData['artist_id']) {
            $artist = Artist::firstOrCreate(['name' => $validatedData['artist_name']]);
            $artistId = $artist->id;
        } else {
            $artistId = $validatedData['artist_id'];
        }
    
        $imageName = time() . '.' . $request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
    
        $artwork = new Artwork();
        $artwork->title = $validatedData['title'];
        $artwork->description = $validatedData['description'];
        $artwork->price = $validatedData['price'];
        $artwork->artwork_img = 'images/' . $imageName;
        $artwork->artist_id = $artistId;
        $artwork->save();
    
        return redirect()->route('artworks.index')->with('success', 'Dzieło sztuki zostało dodane pomyślnie!');
    }
    

    public function destroy(Artwork $artwork)
    {
        $artwork->delete();

        return redirect()->route('artworks.index')->with('success', 'Dzieło zostało usunięte');
    }

}
