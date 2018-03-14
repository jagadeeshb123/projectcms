<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }

    public function edit($id)
    {
        Comment::where(['id'=>$id])->update([
            'is_active'=> \request('is_active')
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back();
    }
}
