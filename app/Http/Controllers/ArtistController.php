<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\Storage; 

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        $artists = Artist::all();
        return view('artists.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'description' => 'nullable|string',
            'artist_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $artist_img_path = null;
        if ($request->hasFile('artist_img')) {
            $artist_img_path = $request->file('artist_img')->store('public/artist_images');
            $artist_img_path = asset(Storage::url($artist_img_path));
        }

        $artist = new Artist();
        $artist->name = $request->name;
        $artist->date_of_birth = $request->date_of_birth;
        $artist->description = $request->description;
        $artist->artist_img = $artist_img_path;
        $artist->save();

        return redirect()->route('artists.index')->with('success', 'Artysta został pomyślnie dodany.');
    }

    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'description' => 'nullable|string',
            'artist_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $artist = Artist::findOrFail($id);

        $artist->name = $request->name;
        $artist->date_of_birth = $request->date_of_birth;
        $artist->description = $request->description;

        if ($request->hasFile('artist_img')) {
            $artist_img_path = $request->file('artist_img')->store('public/artist_images');
            $artist->artist_img = asset(Storage::url($artist_img_path));
        }

        $artist->save();

        return redirect()->route('artists.index')->with('success', 'Dane artysty zostały pomyślnie zaktualizowane.');
    }

    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'Artysta został pomyślnie usunięty.');
    }

    public function show(Artist $artist)
    {
        return view('artists.show', ['artist' => $artist]);
    }
}
