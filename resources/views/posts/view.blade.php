@extends('posts.layouts.masterView')

@section('content')
    <div class="col-md-8 blog-main">
        <div class="container">
            <h1>{{$post->title}}</h1>
            <hr>
            <p class="blog-post-meta">Created: <strong>{{$post->created_at->diffForHumans()}}</strong> by <strong>{{$post->user->name}}</strong></p>
            @if($post->photo->file)
                <img class="img-responsive" src="{{$post->photo->file}}" alt="No Photo for post">
            @endif
            <hr>
            <p class="text-justify">{{$post->body}}</p>
            <hr>

            @if(Auth::check())
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="/comments/{{$post->id}}" method="post">
                        {{@csrf_field()}}

                        <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                        <div class="form-group">
                            <textarea name="body" id="" cols="2" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="form-group text-info">
                            @if(Session::has('comment_message'))
                                {{session('comment_message')}}
                            @endif
                        </div>
                        <button class="btn btn-primary" id="submit" value="submit">Post Comment</button>
                    </form>
                </div>
            @endif

            @if(count($comments) > 0)
                <hr>
                <hr>
                <div class="container">
                    @foreach($comments as $comment)
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->author}}
                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$comment->body}}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection