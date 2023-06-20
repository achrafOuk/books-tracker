
<x-book-form 
    route="{{ route('store-book') }}" 
    page="Add new book" 
    :name="old('name')" 
    :image="old('image')" 
    :publication_year="old('publication_year')" 
    :description="old('description')" 
    :authors="$authors" 
    :categories="$categories" 
    :category="old('category')" 
/>