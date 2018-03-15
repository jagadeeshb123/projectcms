<?php namespace App\Http\Controllers;

/**
 * Class AuthorPostsController
 *
 * Author can create new post and view his posts
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Controllers
 */

use App\Models\CMS\post;
use App\Models\CMS\Category;
use Illuminate\Support\Facades\Auth;

class AuthorPostsController extends Controller
{
    /**
     * View all author posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user   = Auth::user()->id;
        $posts  = post::where('user_id', $user)->get();

        return view('author.posts.index', compact('posts'));
    }

    /**
     * Create new post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::get()->all();

        return view('author.posts.create', compact('categories'));
    }
}
