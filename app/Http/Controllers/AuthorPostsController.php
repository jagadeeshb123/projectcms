<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AuthorPostsController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $posts = post::where('user_id', $user)->get();

        return view('author.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::get()->all();

        return view('author.posts.create', compact('categories'));
    }
}
