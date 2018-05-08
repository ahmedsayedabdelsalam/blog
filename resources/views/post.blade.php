@extends('layouts.app')

@section('title', 'Single')

@section('content')


    <div class="container">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            @if(Auth::id() == $post->user->id)
                <a class="btn btn-dark" href="{{ route('post_edit' , $post->id ) }}">edit</a>
                <form action="{{ route('post_delete', $post->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-dander" type="submit">delete</button>
                </form>                
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
    </div>
@endsection