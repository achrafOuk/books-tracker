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
}
