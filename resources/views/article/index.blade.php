@extends('layouts.app')
@section('pageTitle', 'Your everyday life stories')
@section('content')

    <div class="infinite-scroll">
        <div class="container">
            @foreach($articles as $article)
            <article class="art-panel">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="title clearfix topbar">
                            <div class="pull-left logo">
                                <span>FML</span>
                            </div>
                            <div class="pull-right">
                                <span class="twitter sharrre btn btn-default btn-xs"><i class="fa fa-twitter"></i></span>
                                <span class="facebook sharrre btn btn-default btn-xs"><i class="fa fa-facebook"></i></span>
                                <a class="btn btn-default btn-xs bookmark"><i class="fa fa-star" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="panel-content">
                            <p class="block"><a href="/article/{{ $article->id }}">{{ $article->body }}</a></p>
                            <div class="text-left votes clearfix">
                                <span class="vote">
                                    <div class="flipcard pull-left block-min" style="height: 34px; width: 257px; position: relative;">
                                        <div class="front" style="backface-visibility: hidden; position: absolute; z-index: 1; height: 100%; width: 100%;">
                                            <div class="btn-group" style="backface-visibility: hidden;">
                                                <div style="backface-visibility: hidden;">
                                                    <a class="btn btn-vdm" href="javascript:void(0);" onclick="vote(this)" data-vote="0" data-route="/api/article/{{ $article->id }}/vote" style="backface-visibility: hidden;">
                                                        I agree, your life sucks
                                                    </a>
                                                    <button class="btn btn-default vote-up title" type="button" style="backface-visibility: hidden;">{{ $article->vote->vote }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                                <span class="vote">
                                    <div class="flipcard pull-left block-min btn-down" style="height: 34px; width: 257px; position: relative;">
                                        <div class="front" style="backface-visibility: hidden; position: absolute; z-index: 1; height: 100%; width: 100%;">
                                            <div class="btn-group" style="backface-visibility: hidden;">
                                                <div style="backface-visibility: hidden;">
                                                    <a class="btn btn-vdm2" href="javascript:void(0);" onclick="vote(this)" data-vote="1" data-route="/api/article/{{ $article->id }}/vote" style="backface-visibility: hidden;">
                                                        You deserved it
                                                    </a>
                                                    <button class="btn btn-default vote-down title" type="button" style="backface-visibility: hidden;">{{ $article->vote->vote1 }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                                <a class="bullecomment animateNumber" href="/article/{{ $article->id }}">{{ count($article->comments) }}</a>
                            </div>
                            <div class="clearfix block-min">
                                <div class="pull-left smileys block-min fullsize-xs">
                                    <style>.icon_smiley_art {width:30px;}</style>
                                    
                                    <button style="background-color:transparent; padding:0px;" class="btn smiley"
                                    data-vote="1" onclick="smile(this)"
                                    data-route="/api/article/{{ $article->id }}/smile">
                                        <img class="icon_smiley_art" alt="Amusing face" src="/img/smiley/amusing.svg">
                                        <div class="sharre_count count">{{ $article->vote->smile1 }}</div>
                                    </button>
                                    <button style="background-color:transparent; padding:0px;" class="btn smiley" 
                                    data-vote="2" onclick="smile(this)"
                                    data-route="/api/article/{{ $article->id }}/smile">
                                        <img class="icon_smiley_art" alt="Funny face" src="/img/smiley/funny.svg">
                                        <div class="sharre_count count">{{ $article->vote->smile2 }}</div>
                                    </button>
                                    <button style="background-color:transparent; padding:0px;" class="btn smiley" 
                                    data-vote="3" onclick="smile(this)"
                                    data-route="/api/article/{{ $article->id }}/smile">
                                        <img class="icon_smiley_art" alt="Weird face" src="/img/smiley/weird.svg">
                                        <div class="sharre_count count">{{ $article->vote->smile3 }}</div>
                                    </button>
                                    <button style="background-color:transparent; padding:0px;" class="btn smiley" 
                                    data-vote="4" onclick="smile(this)"
                                    data-route="/api/article/{{ $article->id }}/smile">
                                        <img class="icon_smiley_art" alt="Hilarious face" src="/img/smiley/hilarious.svg">
                                        <div class="sharre_count count">{{ $article->vote->smile4 }}</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center" style="background-color: #f5f5f5;color: #999;font-weight: lighter;font-size: 12px;padding: 5px;">
                            By {{$article->author}} - 
                            @if($article->gender =="f")<i class="fa fa-female" aria-hidden="true"></i>@else<i class="fa fa-male" aria-hidden="true"></i>@endif
                            / <?php echo date("l, F jS,  Y H:m", strtotime($article->created_at)); ?> /
                            
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            
            {{ $articles->links() }}
        </div>
    </div>
    
@endsection