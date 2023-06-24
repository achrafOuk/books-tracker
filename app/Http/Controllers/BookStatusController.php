<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookStatus;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\BookStatusRequest;

class BookStatusController extends Controller
{
    //
    public function store($slug,BookStatusRequest $request)
    {
        $book_status = $request->validated();
        BookStatus::create([
            'status_id'=>$book_status['status_id'], 
            'user_id'=>Auth::user()->id,
            'book_id'=>$book_status['book_id']
        ]);
        return redirect()->route('dashboard')
        ->with('msg','status of the book was updated')
        ->with('type','green');

    }
}
