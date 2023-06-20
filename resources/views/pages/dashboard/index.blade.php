<x-app-layout>

<div class="m-[5%] w-[90]">
    {{-- @include('components.alert') --}}
    <div class="flex flex-row">
        {{-- <x-search-component  action="{{route('seach-books-dashboard')}}" :searchTerm="empty($searchTerm) ? '': $searchTerm" :areas="$areas" :categories="$categories" /> --}}
        <div class="flex flex-col w-full md:w-[100%] ">
            <a href="{{ route('create-book') }}" >
                <button class="bg-purple p-5 text-white mb-5 w-fit whitespace-nowrap">
                    Add new book
                </button>
            </a>

        <div class="mb-5">
        <table class="table-auto border xl:w-full">
            <thead>
                <tr>
                    @foreach($columns as $column)
                        <th scope="col" class="border px-4 py-2 text-gray-800">
                            {{ $column }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

            @foreach($books as $book)
                <tr class="bg-white text-black border-b ">
                    <td scope="row" class="border px-4 py-2">
                        {{ $loop->iteration + ( $books->currentPage() - 1) * $books->perPage() }}
                    </th>
                    <td class="px-6 py-4">
                        <img src=" {{ $book->image }}" alt=" {{ $book->name }}" class="max-w-[200px] w-[200px]" />
                    </td>
                    <td class="border px-4 py-2">
                        {{ $book->name }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $book->publication_year }}
                    </td>

                    <td class="flex px-4 py-2">
                        <a href="{{ route('edit-book',['slug'=>$book->slug]) }}">
                            <button class="bg-purple text-white font-bold py-2 px-4 rounded mr-2">update</button>
                        </a>
                        <form method="POST" action="">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">delete</button>
                        </form>
                    </td> 
                </tr>
            @endforeach

            </tbody>
        </table>
        </div>

        @include("components/paginate") 
        </div>

    </div>
</div>

</x-app-layout>

