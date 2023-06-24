<x-app-layout :title="$title">

<div class="m-[5%] overflow-x-hidden" x-data="{open:false}">
    <div class="flex flex-row w-full">
        <x-search :authors="$authors" :categories="$categories"/>
        <div :class="{'hidden md:flex md:flex-col md:w-[80%]':!open,'hidden md:flex md:flex-col md:w-[80%]':open}" style=" width: 100%;">
            <p class="icon-settings block sm:hidden" @click="open=!open" style=" padding: 1%; cursor: pointer; width: 10%; text-align: center; background: white; color: black; border: .1rem solid; ">
            </p>
            <p >
              Lastest books
            </p>
            <div class="flex flex-wrap -mx-4 sm:w-full">
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