@extends('layouts.app')
@section('pageTitle', 'Your everyday life stories')
@section('content')
    <div class="container">
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
                        <p class="block">{{ $article->body }}</p>
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
                            <a class="bullecomment animateNumber" href="#">{{ count($article->comments) }}</a>
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
        <div class="block">
            <div class="btn-group">
                <a class="btn btn-info btn-sm title" href="/{{ $article->categories }}" alt="{{ $article->categories }}">
                {{ $article->categories }}
                </a>
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        @guest
            <div id="addComment" class="addcomment">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-content">
                        <div class="title block">
                            Add a comment
                            <span id="replyto" style="display: none;">
                                - Reply to : #
                                <span id="replytoid"></span>
                            </span>
                        </div>
                            <div class="text-center block title">
                                <div class="block-min">You must be logged in to be able to post comments!</div>
                                <a class="btn btn-primary" href="/register ">Create my account</a>
                                <a class="btn btn-primary" href="/login ">Sign in</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div id="addComment" class="addcomment">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="/comment/create" method="POST">

                        {{ csrf_field() }}
                        <input type="hidden" name="authorid" value="{{ Auth::id() }}" />
                        <input type="hidden" name="articleid" value="{{ $article->id }}" />
                        <input id="replyid" type="hidden" name="replytoid" value="" />
          
                        <div class="panel-content">
                            <div class="title block">
                                Add a comment
                                <span id="replyto" style="display: none;">
                                    - Reply to : #
                                    <span id="replytoid"></span>
                                </span>
                            </div>
                            <div class="form-group">
                                <textarea name="content" required="required" rows="8" maxlength="2000" class="content-message form-control"></textarea>
                            </div>
                            <div class="form-group clearfix text-center">
                                <input type="submit" class="btn btn-primary block-min" value="Publish">
                                <div class="text-center">
                                    Make sure your text complies with
                                    <a href="#">our rules</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endguest
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-content title">
                    Comments
                </div>
            </div>
        </div>
        
        <section class="comment-list">
            @foreach($article->comments as $comment)
                @if($comment->parent_id == NULL)
                    <article class="row comment">
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <figure class="block">
                        <a href="#">
                            <img class="img-responsive lazyloaded" src="https://www.fmylife.com/images/default-avatar.jpg">
                        </a>
                    </figure>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default arrow left">
                        <div class="panel-body">
                            <header class="text-left">
                                <div class="comment-user">
                                    <i class="fa fa-user"></i> By
                                    <a href="#">User</a>
                                    <!--|-->
                                    <!--<i class="fa fa-certificate" aria-hidden="true"></i> 14-->
                                </div>
                                <time class="comment-date">
                                    #{{ $comment->id }} -
                                    <i class="fa fa-clock-o"></i> <?php echo date("l, F jS,  Y H:m", strtotime($comment->created_at)); ?>
                                </time>
                            </header>
                            <div class="comment-post">
                                <div><p>{{ $comment->content }}</p></div>
                            </div>
                            <div class="comment-user-toolbar">
                                <div class="text-right">
                                    <a class="btn btn-default btn-sm pull-left send-private-message" href="javascript:void(0);">
                                        <i class="fa fa-thumbs-up icon"></i>
                                        Send a private message
                                    </a>
    
                                    <a class="btn btn-default btn-sm thumb-up" 
                                    data-route="/api/comment/{{ $comment->id }}/up"
                                    onclick="commentVote(this)" href="javascript:void(0);">
                                        <i class="fa fa-thumbs-up icon"></i>
                                        <span>{{ $comment->up }}</span>
                                    </a>
                                    <a class="btn btn-default btn-sm thumb-down"
                                    data-route="/api/comment/{{ $comment->id }}/down"
                                    onclick="commentVote(this)" href="javascript:void(0);">
                                        <i class="fa fa-thumbs-down icon"></i>
                                        <span>{{ $comment->down }}</span>
                                    </a>
    
                                    <a class="btn btn-default btn-sm reply-comment" 
                                    onclick="reply({{ $comment->id }})"
                                    href="#addComment">
                                        <i class="fa fa-reply"></i>
                                        Reply
                                    </a>
                                    <a class="btn btn-sm report-abuse btn-default"
                                    data-route="/api/comment/{{ $comment->id }}/report"
                                    onclick="commentVote(this)" href="javascript:void(0);">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </article>
                @endif
                
                <!--Reply Comments-->
                @if ($comment->replies)
                    @foreach($comment->replies as $reply)
                        <article class="row comment">
                            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                                <figure class="block">
                                    <a href="#">
                                        <img class="img-responsive lazyloaded" src="https://www.fmylife.com/images/default-avatar.jpg">
                                    </a>
                                </figure>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="panel panel-default arrow left">
                                    <div class="panel-heading right">Reply</div>
                                    <div class="panel-body">
                                        <header class="text-left">
                                            <div class="comment-user">
                                                <i class="fa fa-user"></i> By
                                                <a href="#">User</a> 
                                            </div>
                                            <time class="comment-date">
                                                #{{ $reply->id }} -
                                                <i class="fa fa-clock-o"></i> <?php echo date("l, F jS,  Y H:m", strtotime($reply->created_at)); ?>
                                            </time>
                                        </header>
                                        <div class="comment-post">
                                            <div><p>{{ $reply->content }}</p></div>
                                        </div>
                                        <div class="comment-user-toolbar">
                                            <div class="text-right">
                                            <a class="btn btn-default btn-sm pull-left send-private-message" href="/user/mail/new?user=katmstein">
                                            <i class="fa fa-thumbs-up icon"></i>
                                            Send a private message
                                            </a>
                                            <a class="btn btn-default btn-sm thumb-up"
                                            data-route="/api/comment/{{ $comment->id }}/up"
                                            onclick="commentVote(this)" href="javascript:void(0);">
                                                <i class="fa fa-thumbs-up icon"></i>
                                                <span>{{ $reply->up }}</span>
                                            </a>
                                            <a class="btn btn-default btn-sm thumb-down"
                                            data-route="/api/comment/{{ $comment->id }}/down"
                                            onclick="commentVote(this)" href="javascript:void(0);">
                                                <i class="fa fa-thumbs-down icon"></i>
                                                <span>{{ $reply->down }}</span>
                                            </a>
                                            <a class="btn btn-default btn-sm reply-comment"
                                            onclick="reply({{ $comment->id }})"
                                            href="#addComment">
                                                <i class="fa fa-reply"></i>
                                                Reply
                                            </a>
                                            <a class="btn btn-sm report-abuse btn-default"
                                            data-route="/api/comment/{{ $comment->id }}/report"
                                            onclick="commentVote(this)" href="javascript:void(0);">
                                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @endif
                @continue
            @endforeach
        </section>
    </div>
@endsection