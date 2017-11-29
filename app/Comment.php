<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'author_id',
      'article_id',
      'content',
      'parent_id',
      'up',
      'down',
      'report'
    ];
    /**
     * Return the comment's author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    
    /**
     * Return the comment's article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    
    /**
     * Return the comment's replies
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
