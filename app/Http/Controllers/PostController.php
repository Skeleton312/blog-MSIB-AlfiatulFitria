<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Author;
use App\Models\Article;

class PostController extends Controller
{
    function show(){
        $posts = Post::with('author')->get();
        // dd($posts);
        return view('posts.show', compact('posts'));
    }
    function form(){
        $editMode = false;
        $categories = Category::all();
        $authors = Author::all();

        return view('posts.create', compact('editMode','categories', 'authors'));
    }
    function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'author' => 'required|exists:authors,id',
            'content' => 'required|string',
            'image' =>'required',
        ]);
        
        $article = new Post();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->image = $request->input('image');
        $article->category_id = $request->input('category');
        $article->author_id = $request->input('author');

        $article->save();


        return redirect()->route('show.posts')->with('success', 'Artikel berhasil disimpan!');
    }
    function select($id){
        $post = Post::findOrFail($id);

         return view('posts.select', compact('post'));
    }
    function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('show.posts')->with('success', 'Post berhasil dihapus!');
    }
    function edit($id){
        $editMode = true;
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();

        return view('posts.create', compact('editMode','post', 'categories', 'authors'));

    }
    function update($id){
        $post = Post::findOrFail($id);
        if ($post->status === 'publish') {
            $post->status = 'draft';
            $post->save(); 
            return redirect()->back()->with('success', 'Artikel berhasil ditakedown!');
        }
        else{
            $post->status = 'publish';
            $post->save(); 
            return redirect()->back()->with('success', 'Artikel berhasil dipublish!');
        }      
    }
    function editAll(Request $request, $id){
        $article = Post::findOrFail($id);
        // dd($article);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'author' => 'required|exists:authors,id',
            'category' => 'required|exists:categories,id'
        ]);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->image = $request->input('image');
        $article->author_id = $request->input('author');
        $article->category_id = $request->input('category');
        $article->save();

        return redirect()->route('show.posts')->with('success', 'Post berhasil diupdate!');
    }
}
