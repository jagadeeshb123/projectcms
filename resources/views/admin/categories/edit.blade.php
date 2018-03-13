@extends('admin.layouts.master')


@section('content')

    <h1>Categiroes:-</h1>
    <hr>
            <div class="row">
                <form action="/admin/categories/{{$categories->id}}/update" method="post">
                    <h3>Update category:-</h3>
                    {{@csrf_field()}}

                    <div class="form-group">
                        <lable>Category Name:</lable>
                        <input type="text" class="form-control" name="name" required id="name" value="{{$categories->name}}">
                    </div>

                    <div class="form-group">
                        <button name="submit" class="btn btn-primary" id="submit">Update</button>
                    </div>

                    @include('layouts.errors')

                </form>
            </div>
@endsection