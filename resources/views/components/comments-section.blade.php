@props(['book_slug','comments','is_book_rated'])
<div class="container mx-auto mt-[5%]">
  <h1 class="mb-4 text-2xl font-bold">Reviews Section</h1>
  @if ( auth()->check() )
    @if(  !$is_book_rated )
        <x-comment-form :book_slug="$book_slug"/>
    @else
    @endif
  @else
    <a class="text-purple" href="{{ route('login') }}">Login</a> to your account so you can add your rating about the book
  @endif


  
</div>
@foreach($comments as $comment)
    <article class="mb-6 rounded-lg bg-white text-base">
      <footer class="mb-2 flex items-center justify-between">
        <div class="flex items-center">
          <p class="mr-3 inline-flex items-center text-sm text-black">{{  $comment->user->name }}</p>
          <x-rating-system :rating="$comment->rating"/>
        </div>
      </footer>
      <p class="text-gray-500 ">{{ $comment->comment }}</p>
      <div class="flex items-center mt-2 space-x-4">
          @if( Auth::user()->id ==   $comment->user->id  )
            <button class="text-sm text-blue-500 hover:underline">Edit</button>
            <form action="{{ route('delete-book-comment',['slug'=>$book_slug]) }}" method="POST">
              @csrf
              <button class="text-sm text-red-500 hover:underline">Delete</button>
            </form>
          @else
            <button class="text-sm text-gray-500 hover:underline">Report</button>
          @endif
      </div>
    </article>
  @endforeach
