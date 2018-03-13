@extends('admin.layouts.master')

@section('content')

    <h1>Comments:-</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Commenter</th>
            <th>Email</th>
            <th>Comment Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($comments)
            @foreach($comments as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->author}}</td>
                    <td>{{$item->email}}</td>
                    <td><a href="#">{{$item->body}}</a></td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>{{$item->updated_at->diffForHumans()}}</td>
                    <td>
                        @if($item->is_active == 0)
                            <form action="/admin/comments/{{$item->id}}" method="post">
                                {{@csrf_field()}}
                                <input type="hidden" name="is_active" value="1">
                                <button class="btn-success btn" type="submit" id="submit"><a href="">Approve</a></button>
                            </form>
                        @endif
                        @if($item->is_active == 1)
                                <form action="/admin/comments/{{$item->id}}" method="post">
                                    {{@csrf_field()}}
                                    <input type="hidden" name="is_active" value="0">
                                    <button class="btn-info btn" type="submit" id="submit"><a href="">UnApprove</a></button>
                                </form>
                            @endif
                    </td>
                    <td><a href="/posts/{{$item->post_id}}">View Post</a></td>

                    <td><a href="/admin/comments/{{$item->id}}/delete">
                            <button class="btn btn-danger">Delete Comment</button></a>
                    </td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection