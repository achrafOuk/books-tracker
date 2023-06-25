<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookStatus;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Status;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\BookStatusRequest;

class BookStatusController extends Controller
{
    //
    public function __construct() {
        $this->authors =  Author::select('name')->get();
        $this->categories = Category::select('name')->get();
        $this->pagination = 12;
        $this->status = Status::get();
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $books = Book::with(['status'])->whereHas('status',function($query) use($user_id){
            $query->where('user_id','=',$user_id);
        })->paginate(15);
        $title = 'tracked books';
        // dd($books);
        return  view( 'pages.books.favorite',['books'=>$books,'title'=>$title,'authors'=>$this->authors,'categories'=>$this->categories] ) ;
    }
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
