<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Show all the books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('title', 'asc')->paginate(10);
        if(empty($books)){abort(404);}
        return view('book.index')->with('books', $books);
    }
    
    /**
     * Show a single book.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->first();
        if(empty($book)){abort(404);}
        return view('book.show')->with('book', $book);
    }
}
