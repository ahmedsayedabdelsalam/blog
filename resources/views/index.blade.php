
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-danger text-center">
            {{ Session::get('message') }}
        </div>
    @endif

    <h1 class="text-center">welcome to my blog</h1>

    <div class="container">
        @include ('partials.errors')        
        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="{{ route('post', $post->id) }}">{{ $post->title }}</a></h2>
                @if(Auth::id() == $post->user->id)
                    <form action="{{ route('post_edit' , $post->id ) }}" method="POST" class="float-left">
                        {{ csrf_field() }}
                        <button class="btn btn-dark" type="submit">edit</button>
                    </form>
                    <form action="{{ route('post_delete', $post->id) }}" method="POST" class="float-left ml-2">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form> 
                    <div class="clearfix"></div>
                @endif
                <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by <a href="{{ route('author', $post->user->id) }}">{{ $post->user->name }}</a></p>
                <p>{{ $post->content }}</p>
                <ul>
                    @foreach($post->comments->reverse() as $comment)
                        <li>
                            <strong><a href="{{ route('author', $comment->user->id) }}">{{ $comment->user->name }}</a></strong>
                            <u>({{ $comment->created_at->diffForHumans() }})</u>
                            {{ $comment->content }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <form method="POST" action="/comment/create/{{$post->id}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="content">Comment Content</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="3" placeholder="comment content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comment</button>
            </form>
            <hr class="mb-5">
        @endforeach
        <div class="text-center">{{ $posts->links() }}</div>
    </div>
@endsection