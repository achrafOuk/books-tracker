<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $url = "https://www.googleapis.com/books/v1/volumes?q=\"\"";
        $response = Http::get($url)->json();
        $item = 0;

        foreach ($response["items"] as $book) {
            echo "id:$item\n";
            $item++;
            $volume = $book["volumeInfo"];
            $title = $volume["title"];
            $authors = $volume["authors"] ?? ["Unknown"];
            $description = $volume["description"] ?? "No description available.";
            $categories = $volume["categories"] ?? ["Unknown"];
            $thumbnail = $volume["imageLinks"]["thumbnail"] ?? "";
            $publish_date = $volume["publishedDate"] ?? "";
            $book = Book::firstOrCreate([
                'slug'=>Str::slug($title),
                'name'=>$title,
                'image'=>$thumbnail,
                'publication_year' => explode('-',$publish_date)[0],
                'description'=>$description,
            ]);
            foreach($authors as $author)
            {
                $author_data = Author::firstOrCreate([
                    'name'=>$author
                ]);
                $author_data = Author::where('name','=',$author)->first();
                BookAuthor::firstOrCreate([
                    'author_id'=>$author_data->id ,
                    'book_id'=>$book->slug, 
                ]);
            }
            foreach($categories as $category)
            {
                $category_data = Category::firstOrCreate([
                    'name' =>$category
                ]);
                $category_data = Category::where('name','=',$category)->first();
                echo("category id ");
                BookCategory::firstOrCreate([
                    'book_id'=>$book->slug, 
                    'category_id'=>$category_data->id, 
                ]);
            }
        }
    }

}
