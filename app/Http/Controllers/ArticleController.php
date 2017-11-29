<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Vote;
use App\Comment;


class ArticleController extends Controller
{
    
    public function __construct()
    {

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::orderBy('created_at', 'asc')->where('status', 1)->paginate(10);
        if(empty($article)){abort(404);}
        return view('article.index')->with('articles', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->where('status', 1)->first();
        if(empty($article)){abort(404);}
        return view('article.show')->with('article', $article);
    }
    
    /**
     * Display a random resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        $count = DB::table('articles')->where('status', 1)->count();
        $id = rand(1, $count);
        $article = Article::where('id', $id)->first();
        return view('article.show')->with('article', $article);
    }
    
    /**
     * Display a specified category.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories($categories)
    {
        $article = Article::where('categories', $categories)->where('status', 1)->paginate(10);
        if(empty($article)){abort(404);}
        return view('article.index')->with('articles', $article);
    }
    
    /**
     * Display the submission page.
     *
     * @return \Illuminate\Http\Response
     */
    public function submission()
    {
        return view('article.submission'); 
    }
    
    /**
     * Display the moderate page.
     *
     * @return \Illuminate\Http\Response
     */
    public function moderate()
    {
        $article = Article::where('status', 0)->get();
        return view('article.moderate')->with('article', $article[rand(0,count($article)-1)]);
    }
    
    public function moderateVote(Request $request)
    {
        $votes = Vote::find(1)->where('article_id', $request->article_id)->first();
        if($request->vote == 1)
        { 
            Vote::find(1)->where('article_id', $request->article_id)->update(['vote' => ($votes['vote']+1)]);
        } else {
            Vote::find(1)->where('article_id', $request->article_id)->update(['vote1' => ($votes['vote1']+1)]);  
        }
        return self::moderate();    
    }
    
    public function store(Request $request)
    {
        $article = Article::create($request->only(['author', 'gender', 'body', 'categories']));
        Vote::create(['article_id' => $article->id]);
        
        $request->session()->flash('status', 'Your story has been submitted and is awaitng to be moderated. If your story gets through the moderation process, it\'ll published in the next 24 hours.');
        return redirect()->back();
    }
    
}
