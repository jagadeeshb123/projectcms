<?php namespace App\Http\Controllers;

use App\Models\CMS\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostCommentController
 * comments can be posted to a post here
 *@author Jagadeesh Battula jagadeesh@goftx.com
 *
 * @package App\Http\Controllers
 */
class PostCommentController extends Controller
{
    /**
     * Stores comment in database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $data = [
            'post_id'   => $request->get('post_id'),
            'author'    => $user->name,
            'email'     => $user->email,
            'body'      => $request->get('body')
        ];
        Comment::create($data);
        $request->session()->flash('comment_message', 'Your comment is waiting for approval');

        return redirect()->back();
    }
}
