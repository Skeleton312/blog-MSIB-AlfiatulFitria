<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Author;
use App\Models\Article;

class CategoryController extends Controller
{
    function show(){
        $categories = Category::get();
        // dd($posts);
        return view('categories.show', compact('categories'));
    }
    function form(){
        $editMode = false;

        return view('categories.create', compact('editMode'));
    }
    function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
        ]);
        
        $category = new Category();
        $category->title = $request->input('title');
        $category->desc = $request->input('desc');

        $category->save();


        return redirect()->route('show.categories')->with('success', 'Kategori berhasil disimpan!');
    }
    function select($id){
        $category = Category::findOrFail($id);

         return view('categories.select', compact('category'));
    }
    function delete($id)
    {
        $posts = Post::where('category_id', $id)->get();
        $articles = Article::where('category_id', $id)->get();

        if ($posts->isNotEmpty()) {
            foreach ($posts as $post) {
                $post->delete();
            }
        }
        if ($articles->isNotEmpty()) {
            foreach ($articles as $article) {
                $article->delete();
            }
        }
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('show.categories')->with('success', 'Kategori berhasil dihapus!');
    }
    function edit($id){
        $editMode = true;
        $category = Category::findOrFail($id);

        return view('categories.create', compact('editMode', 'category'));

    }
    function editAll(Request $request, $id){
        $category = Category::findOrFail($id);
        // dd($article);
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);
        $category->title = $request->input('title');
        $category->desc = $request->input('desc');
        $category->save();

        return redirect()->route('show.categories')->with('success', 'Kategori berhasil diupdate!');
    }
}
