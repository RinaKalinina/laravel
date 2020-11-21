<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show()
    {
        return view('admin.categories.index')
            ->with('categories', Category::where('status', true)->paginate(10));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function add(CategoriesRequest $request)
    {
        Category::Create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.categories.show');
    }

    public function update(CategoriesRequest $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->back();
    }

    //TODO update category_id in products in category destroy method
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->status = false;
        $category->save();

        return redirect()->back();
    }
}
