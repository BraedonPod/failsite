<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        Comment::create([
            'author_id' => $request->authorid,
            'article_id' => $request->articleid,
            'content' => $request->content,
            'parent_id' => $request->replytoid
        ]);
        
        $request->session()->flash('status', 'Your comment has been successfully added.');
        return redirect()->back();
    }
}
