<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

use App\Models\BookAuthor;
use App\Models\BookCategory;

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
        $searchTerm = $request->input('q');
        $authors = $request->input('authors', []);
        $categories = $request->input('categories', []);
        // dd($categories);
        $books = new Book();
        $books = $books->with(['authors','categories'])->where('name','like','%'.$searchTerm.'%')
        ->whereHas('authors', function ($query) use ($authors) {
            for($i=0;$i<count($authors);$i++)
            {
                $query = $i==0 ? $query->where('name', '=',  $authors[$i] ) : $query->Orwhere('name', '=',  $authors[$i] ) ;
            }
        })
        ->whereHas('categories', function ($query) use ($categories) {
            for($i=0;$i<count($categories);$i++)
            {
                $query = $i==0 ? $query->where('name', '=',  $authors[$i] ) : $query->Orwhere('name', '=',  $authors[$i] ) ;
            }
        });

        $books = $books->paginate($this->pagination)->withQueryString();

        return  view( 'pages.dashboard.index',[ 'title'=>$searchTerm,'searchTerm'=>$searchTerm,'books'=>$books,'authors'=>$this->authors,'categories'=>$this->categories] ) ;
    }
}
