<nav aria-label="Page navigation example" class="mt-[2%]">
  <ul class="inline-flex -space-x-px">
    <li>
      <a href="{{  $books->currentPage() != 1 ? $books->url($books->currentPage()-1) :'' }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 ">
        Previous
      </a>
    </li>

    @if ($books->currentPage() > 3)
        <li>
            <a href="{{ $books->url(1) }}" class="bg-gray-150 border border-gray-300 bg-white px-3 py-2 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700">1</a>
        </li>
    @endif

    @if ($books->currentPage() > 4)
        <span class="px-3 py-1">...</span>
    @endif

    @foreach (range(max(1, $books->currentPage() - 2), min($books->lastPage(), $books->currentPage() + 2)) as $page)
    <li>
        <a href="{{ $books->url($page) }}" class="{{ $page  == $books->currentPage() ? 'bg-purple text-white' : 'bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-700' }} px-3 py-2 leading-tight  border border-gray-300 ">{{ $page }}</a>
    </li>
    @endforeach

    @if ($books->currentPage() < $books->lastPage() - 3)
        <span class="px-3 py-1">...</span>
    @endif

    @if ( $books->currentPage() < $books->lastPage() - 2)
    <li>
        <a href="{{ $books->url($books->lastPage()) }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $books->lastPage() }}</a>
    </li>
    @endif

    <li>
      <a href="{{  $books->currentPage() != $books->lastPage()  ? $books->url($books->currentPage()+1) :'' }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 ">
        Next
      </a>
    </li>

  </ul>
</nav>
