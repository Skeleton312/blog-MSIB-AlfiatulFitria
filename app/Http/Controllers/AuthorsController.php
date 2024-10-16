<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;
use App\Models\Article;
class AuthorsController extends Controller
{
    function show(){
        $authors = Author::get();
        // dd($posts);
        return view('authors.show', compact('authors'));
    }
    function form(){
        $editMode = false;

        return view('authors.create', compact('editMode'));
    }
    function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'bio' => 'required|string|max:255',
            
        ]);
        $author = new Author();
        $author->name = $request->input('name');
        $author->email = $request->input('email');
        $author->bio = $request->input('bio');

        $author->save();


        return redirect()->route('show.authors')->with('success', 'Kategori berhasil disimpan!');
    }
    function select($id){
        $author = Author::findOrFail($id);

         return view('authors.select', compact('author'));
    }
    function delete($id)
    {
        $posts = Post::where('author_id', $id)->get();
        $articles = Article::where('author_id', $id)->get();
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
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('show.authors')->with('success', 'Author berhasil dihapus!');
    }
    function edit($id){
        $editMode = true;
        $author = Author::findOrFail($id);

        return view('authors.create', compact('editMode', 'author'));

    }
    function editAll(Request $request, $id){
        $author = Author::findOrFail($id);
        // dd($article);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'bio' => 'required|string',
        ]);
        $author->name = $request->input('name');
        $author->email = $request->input('email');
        $author->bio = $request->input('bio');
        $author->save();

        return redirect()->route('show.authors')->with('success', 'Kategori berhasil diupdate!');
    }
}
