<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Book;
use Illuminate\Http\Request;

class BookLikesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, Book $book)
    {
        return $book->like();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        return $book->dislike();
    }
}