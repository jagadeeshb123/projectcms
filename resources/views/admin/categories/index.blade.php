@extends('admin.layouts.master')

@section('content')

    <h1>Categiroes:-</h1>
    <hr>

    <div class="row">
        <div class="col-sm-4">
                <form action="/admin/categories" method="post">
                    <h3>Add category:-</h3>
                    {{@csrf_field()}}

                    <div class="form-group">
                        <lable>Category Name:</lable>
                        <input type="text" class="form-control" name="name" required id="name">
                    </div>

                    <div class="form-group">
                        <button name="submit" class="btn btn-primary" id="submit">Add</button>
                    </div>

                    @include('layouts.errors')
                </form>
        </div>

        <div class="col-sm-8">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>

                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="/admin/categories/{{$category->id}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td><a href="/admin/categories/{{$category->id}}/delete">
                                    <button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection