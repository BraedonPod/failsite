<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Article as ArticleResource;
use App\Article;
use App\Vote;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }
    
    public function vote(Request $request, $article)
    {
        
        $votes = Vote::find(1)->where('article_id', $article)->first();
        if($request->vote == 0)
        {
            Vote::find(1)->where('article_id', $article)->update(['vote' => ($votes['vote']+1)]);
            return response()->json(($votes['vote']+1));
        }else {
            Vote::find(1)->where('article_id', $article)->update(['vote1' => ($votes['vote1']+1)]);
            return response()->json(($votes['vote1']+1));
        }
        
    }
    
    public function smile(Request $request, $article)
    {
        $votes = Vote::find(1)->where('article_id', $article)->first();
        if($request->smile == 1)
        {
            Vote::find(1)->where('article_id', $article)->update(['smile1' => ($votes['smile1']+1)]);
            return response()->json(($votes['smile1']+1));
        }elseif($request->smile == 2) {
            Vote::find(1)->where('article_id', $article)->update(['smile2' => ($votes['smile2']+1)]);
            return response()->json(($votes['smile2']+1));
        }elseif($request->smile == 3) {
            Vote::find(1)->where('article_id', $article)->update(['smile3' => ($votes['smile3']+1)]);
            return response()->json(($votes['smile3']+1));
        }else{
            Vote::find(1)->where('article_id', $article)->update(['smile4' => ($votes['smile4']+1)]);
            return response()->json(($votes['smile4']+1));
        }
    }
    
}
