<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::paginate(20);
        return view( 'pages.books.index',compact('books') ) ;
    }
    public function show($slug)
    {
        $book = Book::where('slug','=',$slug);
        if(!$book->exists())
        {
            return redirect('/404');
        }
        $book = $book->with(['authors','categories'])->first();
        return view( 'pages.books.show',compact('book') ) ;
    }
}
