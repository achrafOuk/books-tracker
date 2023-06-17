<x-app-layout>

<div class="container mx-auto py-10">
  <h1 class="mt-[2%] mx-[2%] text-bold text-xl">Lastest books</h1>
    <div class="flex flex-wrap -mx-4">
      @foreach($books as $book)
        <x-book-card :book="$book" />
      @endforeach
       
    </div>
    @if($books->count()) 
        @include("components\paginate") 
    @else
        No result were found
    @endif
</div>

</x-app-layout>