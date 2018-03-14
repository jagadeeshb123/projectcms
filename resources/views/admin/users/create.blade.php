@extends('admin.layouts.master')

@section('content')

    <h2>Create User:-</h2>
    <form action="/admin/users" method="post" enctype="multipart/form-data">

        {{@csrf_field()}}

        <div class="form-group">
            <lable>Name:</lable>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <lable>Email:</lable>
            <input type="text" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <select name="role_id" class="form-control" id="role_id" required>
                <option value="1">Administrator</option>
                <option value="2">Author</option>
                <option value="3">Subscriber</option>
            </select>
        </div>

        <div class="form-group">
            <select name="is_active" class="form-control" id="is_active" required>
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
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <button name="submit" class="btn btn-primary" id="submit">Create</button>
        </div>

        @include('layouts.errors')

    </form>

@endsection