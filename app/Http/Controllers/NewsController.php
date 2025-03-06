<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('delete_flg', 0)->orderBy('published_at', 'desc')->paginate(10);
        return view('news/index', compact('news'));
    }

    public function show($id)
    {
        $news = News::where('id', $id)->where('delete_flg', 0)->firstOrFail();
        return view('news/show', compact('news'));
    }
}
