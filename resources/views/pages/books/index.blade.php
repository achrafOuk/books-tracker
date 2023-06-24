<x-app-layout :title="$title">
{{-- 
<div class="container mx-auto py-10 overflow-x-hidden" >
  <div class=" text-green-800 bg-green-50 hidden">hello</div>
  <div class="flex flex-col">
    <div>
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
    <x-search :authors="$authors" :categories="$categories"/>
  </div>
</div>
--}}

<div class="m-[5%] overflow-x-hidden" x-data="{open:false}">
    <div class="flex flex-row w-full">
        <x-search :authors="$authors" :categories="$categories"/>
        <div :class="{'hidden md:flex md:flex-col md:w-[80%]':!open,'hidden md:flex md:flex-col md:w-[80%]':open}" style=" width: 100%;">
            <p class="icon-settings block sm:hidden" @click="open=!open" style=" padding: 1%; cursor: pointer; width: 10%; text-align: center; background: white; color: black; border: .1rem solid; ">
            </p>
            <div class="flex flex-wrap -mx-4 w-[82%]">
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
    </div>
</div>


</x-app-layout>