<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [ 'book_id', 'user_id', 'note', ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

