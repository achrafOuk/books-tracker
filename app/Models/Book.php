<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'slug';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [ 'slug', 'name', 'image', 'thumbneal', 'publication_year' ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'id', 'id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id', 'slug');
    }

    public function status()
    {
        return $this->hasMany(BookStatus::class, 'id', 'slug');
    }

    public function comments()
    {
        return $this->hasMany(BookComment::class, 'id', 'slug');
    }
}

