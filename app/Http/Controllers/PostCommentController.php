<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $data = [
            'post_id' => $request->post_id,
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->body
        ];
        Comment::create($data);
        $request->session()->flash('comment_message', 'Your comment is waiting for approval');

        return redirect()->back();
    }
}
