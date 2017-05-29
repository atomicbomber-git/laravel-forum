<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function thread()
    {
        return $this->belongsTo("App\Thread");
    }

    public function poster()
    {
        return $this->belongsTo("App\User", "poster_id");
    }

    public function parent()
    {
        return $this->belongsTo("App\Post", "parent_post_id");
    }

    public function children()
    {
        return $this->hasMany("App\Post", "parent_post_id");
    }

    protected $fillable = [
        "thread_id", "poster_id", "content", "parent_post_id", "level"
    ];
}
