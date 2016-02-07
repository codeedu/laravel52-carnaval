<?php

namespace CodePub\Http\Controllers\Admin;

use CodePub\Models\Category;
use Illuminate\Http\Request;

use CodePub\Http\Requests;
use CodePub\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        Category::find($id)->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.categories.index');
    }

}
