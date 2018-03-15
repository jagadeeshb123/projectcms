<?php namespace App\Http\Controllers;

/**
 * Class PostsController
 *
 * Create post, view all posts
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Controllers
 */

use App\Models\CMS\Photo;
use Illuminate\Http\Request;
use App\Models\CMS\post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Show all posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $post       = post::all();
        $timearray  = [];
        $i          = 0;

        foreach ($post as $item)
        {
            $timearray[$i]  = $item->created_at->diffForHumans();
            $i              = $i +1;
        }

        sort($timearray);

        return view('posts.index', compact('post', 'timearray'));
    }

    /**
     * Show post based on post id
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post       = post::findOrFail($id);
        $comments   = $post->comments;

        return view('posts.view', compact('post', 'comments'));
    }

    /**
     * Save post to database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title'         => 'required',
            'category_id'   => 'required',
            'photo_id'      => 'required',
            'body'          => 'required'
        ]);
        $input              = $request->all();
        $user               = Auth::user();
        $photo              = Photo::addPhotoToPublic($request);
        $input['photo_id']  = $photo->id;
        $user->posts()->create($input);

        return redirect('/admin/posts');
    }
}
