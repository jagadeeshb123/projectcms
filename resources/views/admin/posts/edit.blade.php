@extends('admin.layouts.master')

@section('content')

    <h2>Update Post:-</h2>

            <form action="/admin/posts/{{$post->id}}/update" method="post" enctype="multipart/form-data">

                {{@csrf_field()}}

                <div class="form-group">
                    <lable>Title:</lable>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <lable>Body:</lable>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control" id="category_id" required>
                        <option value="0">Uncatagarized</option>
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
                    <button name="submit" class="btn btn-primary" id="submit">Update</button>
                </div>

                @include('layouts.errors')

            </form>


@endsection