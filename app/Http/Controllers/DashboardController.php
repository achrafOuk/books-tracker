<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Actions\BooksSearch;

class DashboardController extends Controller
{
    //
    public function __construct() {
        $this->authors =  Author::select('name')->get();
        $this->categories = Category::select('name')->get();
        $this->pagination = 12;
        $this->columns =[ 'id', 'thumbneal', 'name', 'publication year','actions' ];
    }

    public function index()
    {
        $books = Book::paginate($this->pagination);
        $columns = $this->columns;
        return view( 'pages.dashboard.index',['columns'=>$columns,'books'=>$books,'authors'=>$this->authors,'categories'=>$this->categories] ) ;
    }

    public function search(Request $request)
    {

        $books = new Book();
        $booksSearch = new BooksSearch() ;
        list( $books,$searchTerm,$authors,$categories,$status ) = $booksSearch->execute( $books,$request );
        $books = $books->paginate($this->pagination)->withQueryString();
        return  view( 'pages.dashboard.index',[ 'title'=>$searchTerm,'searchTerm'=>$searchTerm,'books'=>$books,'authors'=>$this->authors,'categories'=>$this->categories] ) ;

    }

}
