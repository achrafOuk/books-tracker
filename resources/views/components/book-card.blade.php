@props(['book'])

<div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 p-4">
    <div class="bg-white rounded-lg">
    <div class="relative">
        <a href="{{route('book-show',['slug'=>$book->slug])}}">
            <img src="{{$book->image}}" alt="Image 1" class="w-full rounded-t-lg">
        </a>
    </div>
    <div class="p-4 w-full h-[50px] truncate" >
        <a href="{{route('book-show',['slug'=>$book->slug])}}" class="text-lg font-semibold">{{ $book->name }}</a>
    </div>

    <span class="flex items-center">
        <x-rating-system :rating="$book->comments->average('rating') "/>
    </span>
    </div>
</div>
