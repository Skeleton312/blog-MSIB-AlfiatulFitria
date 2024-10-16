<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Post;

class ArticleController extends Controller
{
    public function read()
    {
        $articles = Article::all();
        $post = Post::where('status', 'publish')->get();
        return view('index', compact('articles', 'post'));
    }
    public function show($id)
    {
        $article = Article::with('author')->findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
