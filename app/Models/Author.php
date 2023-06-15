<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [  'name', ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors', 'id', 'id');
    }
}

