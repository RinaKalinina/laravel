<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(News $model)
    {
        return view('news.list', [
            'news' => $model->getAllNewsWithPadinate(5)
        ]);
    }

    public function show(News $news)
    {
        return view('news.item', [
            'newsItem' => $news
        ]);
    }
}
