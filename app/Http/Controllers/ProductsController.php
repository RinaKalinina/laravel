<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(Category $category, Product $product)
    {
        return view('products.item', [
            'category' => $category,
            'product' => $product
        ]);
    }

}
