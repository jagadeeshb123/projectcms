@extends('author.layouts.master')

@section('content')

    <h2>Create Post:-</h2>
    <form action="/posts" method="post" enctype="multipart/form-data">

        {{@csrf_field()}}

        <div class="form-group">
            <lable>Title:</lable>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <lable>Category:</lable>
            <select name="category_id" class="form-control" id="category_id">
                <option value="0">Uncategorized</option>
                @if($categories)
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @endif

            </select>
        </div>

        <div class="form-group">
            <lable>Image:</lable>
            <input type="file" id="photo_id" name="photo_id" class="form-control">
        </div>

        <div class="form-group">
            <lable>Description:</lable>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button name="submit" class="btn btn-primary" id="submit">Create Post</button>
        </div>

        @include('layouts.errors')

    </form>

@endsection



