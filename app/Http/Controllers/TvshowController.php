<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tv_show;

class TvshowController extends Controller
{
    /**
     * Show the all the tvshows
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvshows = Tv_show::orderBy('title', 'asc')->paginate(10);
        if(empty($tvshows)){abort(404);}
        return view('tvshow.index')->with('tvshows', $tvshows);
    }

    /**
     * Show the a specific tvshow
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tvshow = Tv_show::where('slug', $slug)->first();
        if(empty($tvshow)){abort(404);}
        return view('tvshow.show')->with('tvshow', $tvshow);
    }
}
