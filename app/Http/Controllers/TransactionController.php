<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;

class TransactionController extends Controller
{
    public function index(Request $request)
{
    $artworkId = $request->input('artwork_id');
    $artwork = Artwork::findOrFail($artworkId);
    return view('transactions.index', compact('artwork'));
}

}
