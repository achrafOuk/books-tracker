<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::paginate(12);
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
    public function create()
    {
        $authors = Author::select('name')->get();
        $categories = Category::select('name')->get();
        return view( 'pages.books.add',compact('authors','categories') ) ;
    }
    public function edit()
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
