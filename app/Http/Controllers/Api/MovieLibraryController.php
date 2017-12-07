<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Movie;
use App\Library_entry;
use Illuminate\Http\Request;

class MovieLibraryController extends Controller
{
    
    public function show(Request $request, Movie $movie)
    {
        $le = Library_entry::where('user_id', Auth::id())->where('source_id', $movie->id)->first();
        $data[0] = $movie;
        $data[1] = $le;
        return response()->json($data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, Movie $movie)
    {   $started = NULL;
        $finished = NULL;
        if($request->status == "Watching"){ $started = date("Y-m-d H:i:s");}
        if($request->status == "Completed"){ $started = date("Y-m-d H:i:s");$finished = date("Y-m-d H:i:s");}
        $le = Library_entry::create([
            'user_id' => Auth::id(),
            'source_id' => $movie->id,
            'source_type' => 'Movie',
            'status' => $request->status,
            'started_at' => $started,
            'finished_at' => $finished
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
        $started = NULL;
        $finished = NULL;
        if($status == "Watching"){ $started = date("Y-m-d H:i:s");}
        if($status == "Completed"){ $started = date("Y-m-d H:i:s");$finished = date("Y-m-d H:i:s");}
        $le = Library_entry::where('user_id', Auth::id())->where('source_id', $movie->id)->first()->update(
            [
                'status' => $status, 
                'started_at' => $started,
                'finished_at' => $finished
            ]);
            
        return response()->json($le);    
    }
}