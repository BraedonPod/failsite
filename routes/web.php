<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login Routes
Auth::routes();

// Route::get('/', function(){
//     $client = Elasticsearch\ClientBuilder::create()->build();
    
//     var_dump($client);
// });

//Main Routes
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'ArticleController@index');
    Route::get('/article/{id}', 'ArticleController@show');
    Route::get('/random', 'ArticleController@random')->name('random');
    Route::get('/submission', 'ArticleController@submission')->name('submission');
    Route::get('/moderate','ArticleController@moderate')->name('moderate');
    Route::post('/moderate','ArticleController@moderateVote');
    Route::get('/{categories}','ArticleController@categories');

    Route::resource('articles', 'ArticleController');
});

//Auth Route
Route::post('/comment/create', 'CommentController@store')->middleware('auth');
