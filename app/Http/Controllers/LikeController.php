<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Like;
use Auth;

class LikeController extends Controller
{
    public function postUp($type) {
        $dublicate = Like::where([
            'likeable_type' => 'App\\'. $type,
            'user_id'=> Auth::id(),
            'likeable_id'=> request('likeable_id')
        ])->get();
        if ( $dublicate->isEmpty() ) {
            $like = new Like;
            $like->user_id = Auth::id();
            $like->likeable_type = 'App\\'. $type;
            $like->likeable_id = request('likeable_id');
            $like->save();
        }
        return back();
    }
    public function postDown($type) {
        $delete = Like::where([
            'likeable_type' => 'App\\'. $type,
            'user_id'=> Auth::id(),
            'likeable_id'=> request('likeable_id')
        ]);
        if( $delete ) {
            $delete->delete();
        }
        return back();
    }
    public function commentUp() {
        $like = new Like;
        $like->user_id = request('user_id');
        $like->comment_id = request('comment_id');
        $like->save();
        return back();
    }
    public function commentDown() {
        $delete = Like::where('comment_id', request('comment_id'))->where('user_id', Auth::id());
        $delete->delete();
        return back();
    }
}
