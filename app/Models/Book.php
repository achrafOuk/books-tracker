<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'slug';
    public $incrementing = false;

    protected $fillable = [ 'slug', 'name', 'image', 'description', 'rating', ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author', 'book_id', 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'book_id', 'slug');
    }

    public function status()
    {
        return $this->hasMany(BookStatus::class, 'book_id', 'slug');
    }

    public function comments()
    {
        return $this->hasMany(BookComment::class, 'book_id', 'slug');
    }
}

