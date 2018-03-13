@extends('posts.layouts.master')

@section('content')
    <div class="col-md-8 blog-main">
        <hr>
        <hr>

        <div class="blog-post">

            @if($post)
                @foreach($post as $item)
                    <h2 class="blog-post-title"><a href="/posts/{{$item->id}}">{{$item->title}}</a></h2>
                    <p class="blog-post-meta">Created: <strong>{{$item->created_at->diffForHumans()}}</strong> by <strong>{{$item->user->name}}</strong></p>
                    <div class="row">
                        <div class="col-sm-7">
                            <p>{{str_limit($item->body, 55)}}</p>
                        </div>
                        <div class="col-sm-5">
                            <img class="img-responsive" width="150" height="100" src="{{$item->photo->file}}" alt="No Photo for post">
                        </div>
                    </div>
                    <hr>
                @endforeach
            @endif
        </div><!-- /.blog-post -->

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div>
@endsection
