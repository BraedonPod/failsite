<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;


class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }
    
    public function vote(Request $request, $id, $status)
    {
        $comment = Comment::find(1)->where('id', $id)->first();
        Comment::find(1)->where('id', $id)->update([$status => ($comment[$status]+1)]);
        return response()->json([($comment[$status]+1), $status]);
    }
}