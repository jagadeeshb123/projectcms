@extends('admin.layouts.master')

@section('content')

    <h2>Update User:-</h2>

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$user->photo?$user->photo->file:'no photo'}}" height="200" width="200" >
        </div>

        <div class="col-sm-9">

            <form action="/admin/users/{{$user->id}}/update" method="post" enctype="multipart/form-data">

                {{@csrf_field()}}

                <div class="form-group">
                    <lable>Name:</lable>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>

                <div class="form-group">
                    <lable>Email:</lable>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <select name="role_id" class="form-control" id="role_id">
                        <option value="1">Administrator</option>
                        <option value="2">Author</option>
                        <option value="3">Subscriber</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="is_active" class="form-control" id="is_active">
                        <option value="0">Not Active</option>
                        <option value="1">Active</option>
                    </select>
                </div>

                <div class="form-group">
                    <lable>Image:</lable>
                    <input type="file" id="photo_id" name="photo_id" class="form-control">
                </div>

                <div class="form-group">
                    <lable>Password:</lable>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <button name="submit" class="btn btn-primary" id="submit">Update</button>
                </div>

                @include('layouts.errors')

            </form>

        </div>
    </div>

@endsection