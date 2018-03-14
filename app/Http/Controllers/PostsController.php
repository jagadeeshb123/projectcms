<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\post;

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

    public function create()
    {
        $categories = Category::get()->all();
        return $categories;
        //return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);

        return redirect('/admin/posts');
    }
}
