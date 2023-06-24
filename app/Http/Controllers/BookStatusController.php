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
        BookStatus::firstOrCreate([
            'status_id'=>$book_status['status_id'], 
            'user_id'=>Auth::user()->id,
            'book_id'=>$slug
        ]);
        return back()
        ->with('msg','status of the book was updated')
        ->with('type','green');
    }

    public function delete($slug)
    {
        BookStatus::where('book_id','=',$slug)->where('user_id','=',Auth::user()->id)->delete();
        return back()
        ->with('msg','book was removed from track list')
        ->with('type','green');

    }

}
