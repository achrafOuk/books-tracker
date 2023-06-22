<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Str;

class BookController extends Controller
{
    //
    public function __construct() {
        $this->authors =  Author::select('name')->get();
        $this->categories = Category::select('name')->get();
        $authors = Author::select('name')->get();

    }
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
        return view( 'pages.books.add',['authors'=>$this->authors,'categories'=>$this->categogires] ) ;
    }
    public function store(BookRequest $request)
    {
        $book_data = $request->validated();
        $microtime = microtime(true);
        $milliseconds = round($microtime * 1000);
        $book = Book::create([
            'slug'=> Str::slug( $book_data['name']." ".$milliseconds ),
            'name'=>  $book_data['name'] ,
            'image'=>$book_data['image'],
            'publication_year'=>$book_data['publication_year'],
            'description'=>$book_data['description'],
        ]);

        $category = Category::firstOrCreate([ 'name'=>$book_data['category'] ]);
        $category = Category::where('name','=',$book_data['category'])->first();
         BookCategory::firstOrCreate([
            'category_id'=>$category->id,
            'book_id' =>$book->slug
        ]);
        foreach( $book_data['authors'] as $author )
        {
            $author_data = Author::firstOrCreate([ 'name'=>$author ]);
            $author_data = Author::where( 'name','=',$author )->first();
            $book_author = BookAuthor::firstOrCreate([
                'author_id'=>$author_data->id,
                'book_id' =>$book->slug
            ]);
        }

        return redirect()->route('dashboard')
        ->with('msg','book was created')
        ->with('type','green');

    }
    //public function edit($slug)
    public function edit( Book $book)
    {
        if(!$book->exists()) return redirect('/404');
        $book = $book->with(['authors','categories'])->first();
        return view( 'pages.books.edit',['book'=>$book,'authors'=>$this->authors,'categories'=>$this->categories] ) ;
    }
    public function update( $slug,BookRequest $request)
    {
        $book_data = $request->validated();
        $book = Book::where('slug','=',$slug)
         ->update([
            'name'=>  $book_data['name'] ,
            'image'=>$book_data['image'],
            'publication_year'=>$book_data['publication_year'],
            'description'=>$book_data['description'],
         ]);
        $book = Book::where('slug','=',$slug)->first();
        $category = Category::firstOrCreate([ 'name'=>$book_data['category'] ]);
        $category = Category::where('name','=',$book_data['category'])->first();
        BookCategory::where('book_id','=',$book->slug)->delete();
        BookCategory::firstOrCreate([
            'category_id'=>$category->id,
            'book_id' =>$book->slug
        ]);
        BookAuthor::where('book_id','=',$book->slug)->delete();
        foreach( $book_data['authors'] as $author )
        {
            $author_data = Author::firstOrCreate([ 'name'=>$author ]);
            $author_data = Author::where( 'name','=',$author )->first();
            $book_author = BookAuthor::firstOrCreate([
                'author_id'=>$author_data->id,
                'book_id' =>$book->slug
            ]);
        }
        return back()
        ->with('msg','book was updated')
        ->with('type','green');
    }

    public function delete($slug)
    {
        $book = Book::where('slug','=',$slug);
        if(!$book->exists()) return redirect('/404');
        $book = $book->delete();
        return redirect()->route('dashboard')
        ->with('msg','book was deleted')
        ->with('type','green');
    }
}
