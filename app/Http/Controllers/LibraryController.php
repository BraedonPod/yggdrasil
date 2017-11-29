<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library_entry;

class LibraryController extends Controller
{
    
    public function store(Request $request)
    {
        Library_entry::create([
            'user_id' => $request->userid,
            'source_id' => $request->sourceid,
            'source_type' => $request->sourcetype,
            'status' => $request->status
        ]);
        return response()->json(200);
    }
}
