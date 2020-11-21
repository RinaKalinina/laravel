<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)->where('status', true)->paginate(6);

        return view('categories.item', [
            'category' => $category,
            'products' => $products
            ]);
    }
}
