<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'image',
        'author_id',
        'category_id',
        'status'
    ];

    public function author(){
        return $this->belongsTo(Author::Class);
    } 
    public function category(){
        return $this->belongsTo(Category::Class);
    } 
}
