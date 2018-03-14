<?php namespace App\Http\Controllers;

use App\Models\CMS\Category;
use App\Models\CMS\Photo;
use App\Models\CMS\post;
use Illuminate\Http\Request;

/**
 * Class AdminPostsController
 * admin can edit update delete posts
 * @author Jagadeesh Battula jagadeesh@goftx.com
 *
 * @package App\Http\Controllers
 */
class AdminPostsController extends Controller
{
    /**
     * View all posts in admin view index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Create new post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::get()->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Edit post
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::get()->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update post to database
     *
     * @param Request $request
     * @param $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $post)
    {
        $photo = null;
        if($request->photo_id)
            $photo = Photo::addPhotoToPublic($request);

        $data = post::updateValidation($request, $photo);
        Post::where(['id'=>$post])->update($data);

        return redirect('/admin/posts');
    }

    /**
     * Delete post from database
     *
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($user)
    {
        $post = Post::findOrFail($user);
        unlink(public_path(). $post->photo->file);
        $post->delete();

        return redirect('/admin/posts');
    }
}
