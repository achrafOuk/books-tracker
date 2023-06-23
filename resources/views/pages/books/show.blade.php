<x-app-layout>
  <section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="{{ $book->name }}" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{$book->image}}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h1 class="text-black text-3xl title-font font-medium mb-1">{{ $book->name }}</h1>
          <div class="flex mb-4">
            <span class="flex items-center">
              <x-rating-system :rating="$book->comments->average('rating') "/>
              <span class="text-gray-600 ml-3">{{ $book->comments->count() }} Reviews</span>
            </span>
          </div>

          <p class="text-gray-600 mb-4">
              <span class="font-semibold">Author(s):</span> 
              @foreach( $book->authors as $author) 
                {{ $author->name }}
              @endforeach
          </p>

          <p class="text-gray-600 mb-4">
              <span class="font-semibold">Categories:</span> 
              @foreach( $book->categories as $category) 
                {{ $category->name }}
              @endforeach
          </p>

          <p class="text-gray-600 mb-4">
              <span class="font-semibold">Publication Date:</span> {{ $book->publication_year }}
          </p>
          <p class="leading-relaxed">
            {{ $book->description }}
          </p>

        </div>
      </div>
      <x-comments-section :book_slug="$book->slug" :comments="$book->comments"/>
    </div>
  </section>



</x-app-layout>