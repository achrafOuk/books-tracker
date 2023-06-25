<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

use App\Models\BookAuthor;
use App\Models\BookComment;
use App\Models\BookCategory;
use App\Models\BookStatus;
use App\Models\Status;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Actions\BooksSearch;

class BookController extends Controller
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
        $books = Book::paginate($this->pagination);
        $title ='books list';
        return  view( 'pages.books.index',['books'=>$books,'title'=>$title,'authors'=>$this->authors,'categories'=>$this->categories] ) ;
    }

    public function show($slug)
    {
        $book = Book::where('slug','=',$slug);
        if(!$book->exists())
        {
            return redirect('/404');
        }
        $book = $book->with(['authors','categories','comments'])->withCount('comments as total_comments')->first();

        $user_id = Auth::user()?->id;
        $is_book_rated = false;
        $is_book_status = false;
        if( $user_id != null) 
        {
            $is_book_rated = BookComment::where('user_id','=',$user_id)->where('book_id','=',$slug)->count();
            $is_book_status = BookStatus::where('user_id','=',$user_id)->where('book_id','=',$slug)->count();
        }
        $status = $this->status;
        $book_status = $is_book_status ? BookStatus::where('user_id','=',$user_id)->where('book_id','=',$slug)->with('status')->first() : '';

        return view( 'pages.books.show',compact('book','is_book_rated','status','is_book_status','book_status') ) ;
    }

    public function create()
    {
        $authors = Author::select('name')->get();
        $categories = Category::select('name')->get();
        return view( 'pages.books.add',['authors'=>$this->authors,'categories'=>$this->categories ] ) ;
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
    public function edit($slug)
    {
        $book = Book::where('slug','=',$slug);
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

    public function search(Request $request)
    {

        $books = new Book();
        $booksSearch = new BooksSearch() ;
        list( $books,$searchTerm,$authors,$categories ) = $booksSearch->execute( $books,$request );
        $books = $books->paginate($this->pagination)->withQueryString();
        return  view( 'pages.books.index',[ 'title'=>$searchTerm,'searchTerm'=>$searchTerm,'books'=>$books,'authors'=>$this->authors,'categories'=>$this->categories] ) ;
    }
}
