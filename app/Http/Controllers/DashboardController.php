<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    //

    public function __construct() {
        $this->columns =[ 'id', 'thumbneal', 'name', 'publication year' ];
    }
    public function index()
    {
        $books = Book::paginate(20);
        $columns = $this->columns;
        return view( 'pages.dashboard.index',compact('columns','books') ) ;
    }
}
