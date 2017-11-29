<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Book;

class HomeController extends Controller
{
    /**
     * Show Diff rating media.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('metascore', 'desc')->limit(5)->get();
        $books = Book::orderBy('score', 'desc')->limit(5)->get();
        
        return view('index')->with(compact('movies', 'books'));
    }
}
