@props(['book_slug','comments','is_book_rated'])
<div class="container mx-auto py-8">
  <h1 class="mb-4 text-2xl font-bold">Comments Section</h1>
  @if ( auth()->check() )
    @if(  !$is_book_rated )
        <x-comment-form :book_slug="$book_slug"/>
    @else
    @endif
  @else
    <a class="text-purple" href="{{ route('login') }}">Login</a> to your account so you can add your rating about the book
  @endif

  <div class="mt-8">
    <h2 class="mb-2 text-lg font-bold">Comments</h2>
    <ul>

      @foreach($comments as $comment)
        <li class="mb-4">
          <div class="mb-2 flex items-center">
            <span class="font-bold"> {{ $comment->user->name }} </span>
            <x-rating-system :rating="$comment->rating"/>
          </div>
          <p class="text-gray-700">{{ $comment->comment }}</p>
        </li>
      @endforeach

    </ul>
  </div>

</div>
