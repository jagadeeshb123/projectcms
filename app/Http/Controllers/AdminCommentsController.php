<?php namespace App\Http\Controllers;

/**
 * Class AdminCommentsController
 *
 * Admin can edit delete disapprove comments
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Controllers
 */

use App\Models\CMS\Comment;

class AdminCommentsController extends Controller
{
    /**
     * View all comments for all posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Approve or disapprove comments
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        Comment::where(['id'=>$id])->update([
            'is_active'=> \request('is_active')
        ]);

        return redirect()->back();
    }

    /**
     * Delete comments
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back();
    }
}
