<x-app-layout>

 <h1 class="mt-[2%] mx-[2%] text-bold text-xl">Lastest books</h1>
 <div class="flex flex-wrap">
  @foreach($books as $book)
    <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 p-4">
      <div class="bg-white rounded-lg">
        <div class="relative">
          <img src="{{$book->thumbneal}}" alt="Image 1" class="w-full rounded-t-lg">
          <button class="absolute top-2 right-2 bg-white text-black hover:bg-purple hover:text-white rounded-[0.75rem] p-[6%] h-10 w-10">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg> --}}
            <i class="icon-heart-o h-6 w-6 font-bold"></i>
          </button>
        </div>
        <div class="p-4">
          <a href="" class="text-lg font-semibold">{{ $book->name }}</a>
        </div>
      </div>
    </div>
  @endforeach

  <!-- Repeat the above two divs for the remaining items -->
</div>


</x-app-layout>