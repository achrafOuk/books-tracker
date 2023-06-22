<div class="container mx-auto py-8">
  <h1 class="mb-4 text-2xl font-bold">Comments Section</h1>
  @if ( auth()->check()   )
    <x-comment-form/>
  @else
    <a class="text-purple" href="{{ route('login') }}">Login</a> to your account so you can add your rating about the book
  @endif
  <div class="mt-8">
    <h2 class="mb-2 text-lg font-bold">Comments</h2>
    <ul>
      <li class="mb-4">
        <div class="mb-2 flex items-center">
          <span class="font-bold">John Doe</span>
          <span class="ml-2 text-sm">Rating: 4</span>
        </div>
        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in sapien vel ligula pharetra porta vitae sed nibh.</p>
      </li>
      <li class="mb-4">
        <div class="mb-2 flex items-center">
          <span class="font-bold">Jane Smith</span>
          <span class="ml-2 text-sm">Rating: 5</span>
        </div>
        <p class="text-gray-700">Ut pellentesque augue a dui eleifend eleifend.</p>
      </li>
    </ul>
  </div>
</div>
