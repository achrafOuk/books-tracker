<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use App\Models\BookAuthor;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books_file = storage_path('app/public/books.csv');
        $file_data = fopen($books_file,'r');
        $data = fgetcsv($file_data,1000,';');
        $num = count($data);
        $row = 1;
        while(  $data !==false )
        {
            if($row !=1)
            {
                // 'slug', 'name', 'image', 'thumbneal', 'publication_year' 
                $book_title = $data[1];
                $book = Book::firstOrCreate([
                    'slug'=>Str::slug($book_title, '-'),
                    'name'=>$book_title,
                    'publication_year'=>$data[3],
                    'thumbneal'=>$data[6],
                    'image'=>$data[7]
                ]);
                $authors = explode( '&amp',$data[2] );
                foreach($authors as $author)
                {
                    $author_data = Author::firstOrCreate([
                        'name'=>$author
                    ]);
                    $author_data = Author::where('name','=',$author)->first();
                    echo 'id:',$author_data->id;
                    BookAuthor::firstOrCreate([
                        'author_id'=>$author_data->id ,
                        'book_id'=>$book->slug, 
                    ]);
                }
            }
            $row++;
            if($row== 5000)
            {
                break;
            }
            $data = fgetcsv($file_data,1000,';');
        }
    }
}
