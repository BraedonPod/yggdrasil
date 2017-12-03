<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Movie;
use App\Library_entry;
use Illuminate\Http\Request;

class LibraryEntryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, Movie $movie)
    {
        $le = Library_entry::create([
            'user_id' => Auth::id(),
            'source_id' => $movie->id,
            'source_type' => 'Movie',
            'status' => $request->status
        ]);
        return response()->json($le);   
    }
    
    /**
     * Update existing created resource in storage.
     *
     * @return Response
     */
    public function update(Request $request, Movie $movie, $status)
    {
        $le = Library_entry::where('user_id', Auth::id())->where('source_id', $movie->id)->first()->update(['status' => $status]);
        return response()->json($le);    
    }
}