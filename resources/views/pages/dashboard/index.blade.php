<x-app-layout title="admin dashboard">

<div class="m-[5%]" x-data="{open:false}">
     @include('components.alert') 
    <div class="flex flex-row">
        <x-search :authors="$authors" :categories="$categories"/>
        <div :class="{'hidden md:flex md:flex-col md:w-[80%]':!open,'hidden md:flex md:flex-col md:w-[80%]':open}" style=" width: 100%;">
            <div class="flex justify-between">
                <button class="bg-purple p-5 text-white mb-5 w-fit whitespace-nowrap">

                    <a href="{{ route('create-book') }}" >
                        Add new book
                    </a>
                </button>

                <p class="icon-settings block sm:hidden bg-white border border-black p-5 text-black mb-5 w-fit whitespace-nowrap" @click="open=!open" >
                </p>
            </div>
        <div class="mb-5 overflow-x-scroll">
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
                        {{--
                        <a href="{{ route('edit-book',['slug'=>$book->slug]) }}">
                            <button class="bg-purple text-white font-bold py-2 px-4 rounded mr-2">update</button>
                        </a>
                        <form method="POST" action="">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">delete</button>
                        </form>

                        <x-confirmation-modal title="Confirmation"
                        message="Are you sure you want to delete this item?"
                        confirm-action="deleteItem({{ $book->slug }})">
                            Delete
                        </x-confirmation-modal>
                        --}}
                        <!-- Your Blade view -->
                        <a href="{{ route('edit-book',['slug'=>$book->slug]) }}">
                            <button class="bg-purple text-white font-bold py-2 px-4 rounded mr-2">update</button>
                        </a>
                        <x-confirmation-modal action="{{ route('delete-book',['slug'=>$book->slug]) }}"></x-confirmation-modal>
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

