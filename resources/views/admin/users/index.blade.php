@extends('admin.layouts.master')


@section('content')
    <h1>Users:-</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Statuss</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo?$user->photo->file:'No photo exist'}}" ></td>
                    <td><a href="/admin/users/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><a href="/admin/users/{{$user->id}}/delete">
                            <button class="btn btn-danger">Delete</button></a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection