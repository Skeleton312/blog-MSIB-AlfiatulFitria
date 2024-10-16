<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ArticleController::class, 'read'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/myblog', [DashboardController::class, 'myblog'])->name('myblog');
    // posts route
    Route::get('/myblog/posts', [PostController::class, 'show'])->name('show.posts');
    Route::get('/myblog/posts/form', [PostController::class, 'form'])->name('form.posts');
    Route::post('/articles/store', [PostController::class, 'store'])->name('articles.store');
    Route::patch('/articles/edit/{id}', [PostController::class, 'editAll'])->name('articles.edit');
    Route::get('/posts/select/{id}', [PostController::class, 'select'])->name('select.posts');
    Route::get('/posts/{id}', [PostController::class, 'edit'])->name('edit.posts');
    Route::delete('/posts/delete/{id}', [PostController::class, 'delete'])->name('delete.posts');
    Route::patch('/posts/update/{id}', [PostController::class, 'update'])->name('update.posts');
    // categories route
    Route::get('/myblog/category', [CategoryController::class, 'show'])->name('show.categories');
    Route::get('/myblog/categories/form', [CategoryController::class, 'form'])->name('form.categories');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::patch('/categories/edit/{id}', [CategoryController::class, 'editAll'])->name('categories.edit');
    Route::get('/categories/select/{id}', [CategoryController::class, 'select'])->name('select.categories');
    Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('edit.categories');
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('delete.categories');
    Route::patch('/categories/update/{id}', [CategoryController::class, 'update'])->name('update.categories');
    // Author route
    Route::get('/myblog/author', [AuthorsController::class, 'show'])->name('show.authors');
    Route::get('/myblog/authors/form', [AuthorsController::class, 'form'])->name('form.authors');
    Route::post('/authors/store', [AuthorsController::class, 'store'])->name('authors.store');
    Route::patch('/authors/edit/{id}', [AuthorsController::class, 'editAll'])->name('authors.edit');
    Route::get('/authors/select/{id}', [AuthorsController::class, 'select'])->name('select.authors');
    Route::get('/authors/{id}', [AuthorsController::class, 'edit'])->name('edit.authors');
    Route::delete('/authors/delete/{id}', [AuthorsController::class, 'delete'])->name('delete.authors');
    Route::patch('/authors/update/{id}', [AuthorsController::class, 'update'])->name('update.authors');
});

require __DIR__.'/auth.php';
