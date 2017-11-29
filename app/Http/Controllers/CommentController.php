<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comment::create([
            'user_id' => $request->user_id,
            'commentable_id' => $request->source_id,
            'body' => $request->body,
            'parent_id' => $request->replytoid,
            'commentable_type' => $request->source_type
        ]);
        $request->session()->flash('status', 'Your comment has been successfully added.');
        return redirect()->back();
    }
}
