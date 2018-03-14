<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Photo;
use Illuminate\Http\Request;
use App\post;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class PostsController extends Controller
{
    public function index()
    {
        $post = post::all();
        $timearray = [];
        $i = 0;
        foreach ($post as $item){
            $timearray[$i] = $item->created_at->diffForHumans();
            $i = $i +1;
        }
        sort($timearray);
        return view('posts.index', compact('post', 'timearray'));
    }

    public function show($id)
    {
        $post = post::findOrFail($id);
        $comments = $post->comments;

        return view('posts.view', compact('post', 'comments'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'category_id' => 'required',
            'photo_id' => 'required',
            'body' => 'required'
        ]);
        $input = $request->all();
        $user = Auth::user();
        $photo = Photo::addPhotoToPublic($request);
        $input['photo_id'] = $photo->id;
        $user->posts()->create($input);

        return redirect('/admin/posts');
    }
}
