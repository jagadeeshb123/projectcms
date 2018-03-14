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

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::get()->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $post)
    {
        $photo = null;
        if($request->photo_id)
            $photo = Photo::addPhotoToPublic($request);

        $data = post::updateValidation($request, $photo);
        Post::where(['id'=>$post])->update($data);

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
