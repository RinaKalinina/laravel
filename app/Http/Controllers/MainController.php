<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.main')
            ->with('products', Product::with(['category'])
                ->where('status', true)
                ->paginate(6));
    }
}
