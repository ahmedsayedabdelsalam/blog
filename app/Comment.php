<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
use App\Like;

class Comment extends Model
{
    public function post() {
        return $this->belongsTo(Post::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }
}
