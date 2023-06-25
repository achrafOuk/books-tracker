<?php
namespace App\Actions;

use App\Models\Book;

class BooksSearch
{
    public function execute(Book $book,$request)
    {
        $searchTerm = $request->input('q');
        $authors = $request->input('authors', []);
        $categories = $request->input('categories', []);
        $status = $request->input('status', []);
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
        return array( $books,$searchTerm,$authors,$categories,$status);
    }

}