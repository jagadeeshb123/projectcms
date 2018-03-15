<?php namespace App\Http\Controllers;

/**
 * Class AdminCategoriesController
 *
 * Admin can add update delete categories
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Controllers
 */

use App\Models\CMS\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     *View all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store new category in database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect('/admin/categories');
    }

    /**
     * Edit categories
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        return view('/admin/categories/edit', compact('categories'));
    }

    /**
     * Update category and save to database
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        Category::where(['id'=>$id])->update([
            'name'=> $request->get('name')
        ]);

        return redirect('/admin/categories');
    }

    /**
     * Delete category from database
     *
     * @param $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($category)
    {
        Category::findOrFail($category)->delete();

        return redirect('/admin/categories');
    }
}
