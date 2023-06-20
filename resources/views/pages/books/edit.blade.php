
<x-book-form 
    route="{{ route('update-book',['slug'=>$book->slug]) }}" 
    page="Add new book" 
    :name="$book->name" 
    :image="$book->image" 
    :publication_year="$book->publication_year" 
    :description="$book->description" 
    :authors="$authors" 
    :categories="$categories" 
    :category=" $book->categories[0]->name" 
    :selected_authors="$book->authors"
/>