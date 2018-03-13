<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect('/admin/categories');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        return view('/admin/categories/edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        Category::where(['id'=>$id])->update([
            'name'=> $request->name
        ]);

        return redirect('/admin/categories');
    }

    public function destroy($category)
    {
        Category::findOrFail($category)->delete();

        return redirect('/admin/categories');
    }
}
