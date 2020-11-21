<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function show()
    {
        return view('admin.products.index')
            ->with('products', Product::where('status', true)->paginate(10));
    }

    public function create()
    {
        return view('admin.products.create')
            ->with('categories', Category::where('status', true)->get());
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    public function add(ProductRequest $request)
    {
        $imageName = $this->saveImage($request->file('image'));

        Product::Create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'img' => $imageName,
            'description' => $request->description
        ]);

        return redirect()->route('admin.products.show');
    }

    public function update(ProductRequest $request)
    {
        $imageName = $this->saveImage($request->file('image'));

        if (empty($imageName) && $request->imageName) {
            $imageName = $request->imageName;
        }

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->img = $imageName;
        $product->description = $request->description;
        $product->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = false;
        $product->save();

        return redirect()->back();
    }


    /**
     * @param $image
     * @return string
     */
    public function saveImage($image): string
    {
        $imageName = '';

        if ($image) {
            $destinationPath = public_path() . '/img/products/';
            $imageName = $image->hashName();
            $image->move($destinationPath, $imageName);
        }

        return $imageName;
    }
}
