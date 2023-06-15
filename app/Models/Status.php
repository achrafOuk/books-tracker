<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [  'status' ];

    public function bookStatus()
    {
        return $this->hasMany(BookStatus::class, 'status_id');
    }
}

