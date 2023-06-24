<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BookCommentRequest;
use App\Models\BookComment;
use Illuminate\Support\Facades\Auth;

class BookCommentController extends Controller
{
    //
    public function store($slug,BookCommentRequest $request)
    {
        $comment = $request->validated(); 
        BookComment::create([
            'user_id'=>Auth::user()->id,
            'book_id'=>$slug,
            'comment'=>$comment['comment'],
            'rating'=>$comment['rating'],
        ]);
        return back()
        ->with('msg','comment was added')
        ->with('type','green');
    }

    public function delete($slug)
    {
        BookComment::where( 'book_id','=',$slug)->where('user_id','=',Auth::user()->id)->delete();
        return back()
        ->with('msg','comment was deleted')
        ->with('type','green');
    }
}
