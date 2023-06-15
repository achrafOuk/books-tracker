<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    protected $table = 'book_status';
    public $timestamps = false;

    protected $fillable = [ 'status_id', 'user_id', 'book_id' ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}

