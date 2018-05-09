@extends('layouts.app')

@section('title', 'Single')

@section('content')


    <div class="container">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            @if(Auth::id() == $post->user->id)
                <a href="/post/{{ $post->id }}/edit" class="btn btn-dark float-left">edit</a>
                <form action="/post/{{ $post->id }}/delete" method="POST"  class="float-left ml-3">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">delete</button>
                </form>    
                <div class="clearfix"></div>            
            @endif
            <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by <a href="{{ route('author', $post->user->id) }}">{{ $post->user->name }}</a></p>
            <p>{{ $post->content }}</p>
            <ul>
                @foreach($post->comments as $comment)
                    <li>
                        <strong><a href="{{ route('author', $comment->user->id) }}">{{ $comment->user->name }}</a></strong>
                        <u>({{ $comment->created_at->diffForHumans() }})</u>
                        {{ $comment->content }}
                    </li>
                @endforeach
            </ul>
        </div>
        <form method="POST" action="post/{{ $post->id }}/comment">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="content">Comment Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="3" placeholder="comment content" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
    </div>
@endsection