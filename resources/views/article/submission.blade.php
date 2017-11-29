@extends('layouts.app')
@section('pageTitle', 'Submit your FML')
@section('content')

    <div class="container">

        <div class="form-top">
            <div class="form-top-left">
                <h3>Submit your FML</h3>
                <p>
                Have you just experienced an FML moment? Feel like sharing it with the other FML users? Your instinct was right, because it’s good to laugh life off. Follow the instructions below, and if your story gets through the moderation process, it'll published in the next 24 hours.
                </p>
            </div>
        </div>
        <div class="form-bottom contact-form">
            <form method="POST" action="/articles">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="author">Your nickname</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="GENDER">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select name="categories" class="form-control">
                                <option value="School">School</option>
                                <option value="Miscellaneous">Miscellaneous</option>
                                <option value="Geek">Geek</option>
                                <option value="Holidays">Holidays</option>
                                <option value="Transportation">Transportation</option>
                                <option value="Health">Health</option>
                                <option value="Kids">Kids</option>
                                <option value="Animals">Animals</option>
                                <option value="Intimacy">Intimacy</option>
                                <option value="Money">Money</option>
                                <option value="Work">Work</option>
                                <option value="Love">Love</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="body" required="required" rows="8" maxlength="500" class="content-message form-control"></textarea>
                    <div style="text-align:center;">
                        <span class="bootstrap-maxlength label-success label" style="display: table;white-space: nowrap;z-index: 1099;margin: 0 auto;">0 / 500</span>
                    </div>
                    <script>
                        var textarea = document.querySelector("textarea");
                        
                        textarea.addEventListener("input", function(){
                            var maxlength = this.getAttribute("maxlength");
                            var currentLength = this.value.length;
                        
                            if( currentLength == maxlength ){
                                $('.bootstrap-maxlength').html(currentLength +" / "+maxlength);
                                $('.bootstrap-maxlength').toggleClass('label-success label-danger');
                            }else{
                                $('.bootstrap-maxlength').html(currentLength +" / "+maxlength);
                                if($('.bootstrap-maxlength').hasClass('label-danger')){
                                    $('.bootstrap-maxlength').toggleClass('label-danger label-success');
                                }
                            }
                        });
                    </script>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default">Spill the beans!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection