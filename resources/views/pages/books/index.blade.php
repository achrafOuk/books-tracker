<x-app-layout>

<div class="m-[5%]">
  <h1 class="mt-[2%] mx-[2%] text-bold text-xl">Lastest books</h1>
  <div class="flex flex-wrap">
    @foreach($books as $book)
      <x-book-card :book="$book" />
    @endforeach

    @if($books->count()) 
        @include("components\paginate") 
    @else
        No result were found
    @endif 

  </div>
</div>

</x-app-layout>