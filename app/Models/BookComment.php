<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookComment extends Model
{
    protected $table = 'book_comments';
    public $timestamps = false;

    protected $fillable = [  'user_id', 'book_id', 'comment', 'rating', ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

