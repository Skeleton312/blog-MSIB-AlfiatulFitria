<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Auth;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    function show(){
        $id = Auth::id();
        $article = Article::where($id);
    }
    function myblog(){
        $article = Post::all();
        $categories = Category::all();
        $authors = Author::all();
        $articleCount = Post::count();
        $categoriesCount = Category::count();
        $authorsCount = Author::count();
        
        return view('dashboard', compact('article', 'categories', 'authors', "articleCount", 'categoriesCount', 'authorsCount'));
    }
    
}
