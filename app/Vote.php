<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id', 'vote', 'vote1', 'smiley1','smiley2','smiley3','smiley4',
    ];
    
    public function article() { return $this->belongsTo('App\Article'); }
}
