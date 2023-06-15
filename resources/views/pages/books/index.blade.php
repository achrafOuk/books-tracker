<x-app-layout>

 <h1 class="mt-[2%] mx-[2%] text-bold text-xl">Lastest books</h1>
 <div class="flex flex-wrap">

    @foreach($books as $book)
      <x-book-card :book="$book" />
    @endforeach
  </div>

</x-app-layout>