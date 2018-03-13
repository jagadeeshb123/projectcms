<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\User;
use App\post;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::get()->all();

        return view('admin.posts.create', compact('categories'));
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::get()->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $post)
    {
        $input = $request->all();
        if($file = $request->file(['photo_id'])){
            $name  = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        Post::where(['id'=>$post])->update([
            'title'=> $request->title,
            'body'=> $request->body,
            'photo_id'=> $photo->id,
            'category_id' => $request->category_id
        ]);

        return redirect('/admin/posts');

    }

    public function destroy($user)
    {
        $post = Post::findOrFail($user);
        unlink(public_path(). $post->photo->file);
        $post->delete();

        return redirect('/admin/posts');

    }
}
