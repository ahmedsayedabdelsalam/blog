@extends('layouts.app')

@section('content')
@if(Session::has('message'))
    <div class="alert alert-danger text-center">
        {{ Session::get('message') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::id() == $user->id)
                        You are logged in! welcome to your profile <strong>{{ $user->name }}</strong>
                        <p>your email: <strong>{{ $user->email }}</strong></p>
                        <p>your have: <strong>{{ $user->posts->count() }} Posts</strong></p>
                        <p>your have: <strong>{{ $user->comments->count() }} Comments</strong></p>
                        <img src="{{ asset('storage/user_images/' . $user->image) }}" alt="profile pic" width="150" height="150">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="/author/{{ $user->id }}/upload" method="POST" enctype="multipart/form-data">
                            Select image to upload:
                            {{ csrf_field() }}
                            <input type="file" name="image" id="image">
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                        <form method="POST" action="/post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="post title" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Post Content</label>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="5" placeholder="post content" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    @else
                        welcome to <strong>{{ $user->name }}'s</strong> profile
                        <p>email: <strong>{{ $user->email }}</strong></p>
                        <p>he have: <strong>{{ $user->posts->count() }} Posts</strong></p>
                        <p>he have: <strong>{{ $user->comments->count() }} Comments</strong></p>
                        <img src="{{ asset('storage/user_images/' . $user->image) }}" alt="profile pic" width="150" height="150">
                    @endif
                    
                    <hr>
                    
                    @foreach($user->posts->reverse() as $post)
                        <div class="blog-post">
                            <h2 class="blog-post-title"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h2>
                            @if(Auth::id() == $post->user->id)
                            <a href="/post/{{ $post->id }}/edit" class="btn btn-dark float-left">edit</a>
                            <form action="/post/{{ $post->id }}" method="POST" class="float-left ml-2">
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
                        <form method="POST" action="post/{{ $post->id }}/comment">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="content">Comment Content</label>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="3" placeholder="comment content" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>
                        <hr>
                    @endforeach

                    @include ('partials.errors')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
