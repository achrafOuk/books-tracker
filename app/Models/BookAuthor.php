<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $table = 'book_author';
    public $timestamps = false;

    protected $fillable = [ 'author_id', 'book_id', ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'slug');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'slug');
    }
}

