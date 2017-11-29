@extends('layouts.app')
@section('pageTitle', 'Moderate')
@section('content')
    <div class="container">
        <article class="art-panel col-xs-12">
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
                        </div>
                        <div class="text-center" style="background-color: #f5f5f5;color: #999;font-weight: lighter;font-size: 12px;padding: 5px;">
                            By {{$article->author}} - 
                            @if($article->gender =="f")<i class="fa fa-female" aria-hidden="true"></i>@else<i class="fa fa-male" aria-hidden="true"></i>@endif
                            / <?php echo date("l, F jS,  Y H:m", strtotime($article->created_at)); ?> /
                            
                        </div>
                    </div>
                </div>
            </article>
        <div class="clearfix"></div>
        <div class="text-center block">
            <div class="btn-group">
                <form method="POST" action="/moderate">
                    {{ csrf_field() }}
                    <input type="hidden" name="article_id" value="{{ $article->id }}"/>
                    <input type="hidden" name="vote"/>
                    <button type="button" class="btn btn-lg btn-success btn-yes" data-value="1">Yes</button>
                    <button type="button" class="btn btn-lg btn-danger btn-no" data-value="0">No</button>
                    <script type="text/javascript">
                        $('button.btn.btn-yes, button.btn.btn-no').off('click').on('click', function () {
                            $(this).closest('form').find('input[name=vote]').val($(this).data('value'));
                            $(this).closest('form').submit();
                        });
                    </script>
                </form>
            </div>
        </div>
        <p class="text-center">Does this story make you laugh? Is it really an FML that deserves to be published? Make a decision.</p>
    </div>
@endsection