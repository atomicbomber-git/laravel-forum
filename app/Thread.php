<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Thread extends Model
{
    public function poster()
    {
        return $this->belongsTo("App\User", "poster_id");
    }

    public function posts()
    {
        return $this->hasMany("App\Post");
    }

    protected $fillable = [
        "poster_id", "title", "content", "is_active"
    ];
}
