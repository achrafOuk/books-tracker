@props(['book'])

<div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 p-4">
    <div class="bg-white rounded-lg">
    <div class="relative">
        <a href="{{route('book-show',['slug'=>$book->slug])}}">
            <img src="{{$book->image}}" alt="Image 1" class="w-full rounded-t-lg">
        </a>
        <button class="absolute top-2 right-2 bg-white text-black hover:bg-purple hover:text-white rounded-[0.75rem] p-[6%] h-10 w-10">
            <i class="icon-heart-o h-6 w-6 font-bold"></i>
        </button>
    </div>
    <div class="p-4">
        <a href="{{route('book-show',['slug'=>$book->slug])}}" class="text-lg font-semibold">{{ $book->name }}</a>
    </div>
    </div>
</div>
