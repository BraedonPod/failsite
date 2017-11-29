<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'author', 'gender', 'body', 'status', 'categories'
    ];
    
    public function vote() { return $this->hasOne('App\Vote'); }
    
    /**
     * Return the post's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
