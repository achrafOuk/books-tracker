{{-- <x-app-layout>
<div class="mx-auto w-full py-4">
      <form class="mb-4 rounded bg-white px-8 pb-8 pt-6">
        <h1 class="mb-4 font-bold">Add new book</h1>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="bookName"> Book Name </label>
          <input class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" id="bookName" type="text" placeholder="Enter the book name" />
        </div>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="imageInput"> Image </label>
          <input class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" id="imageInput" type="text" placeholder="Enter the image URL" />
        </div>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="publicationYear"> Publication Year </label>
          <input class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" id="publicationYear" type="number" placeholder="Enter the publication year" min="1970" max="date('Y')"/>
        </div>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="description"> Description </label>
          <textarea class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" id="description" rows="4" placeholder="Enter the book description"></textarea>
        </div>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="language"> Authors: </label>
          <input type="text" name="city" list="authors" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" />
          <datalist id="authors">
            @foreach( $authors as $author)
              <option value="$author->name"></option>
            @endforeach

          </datalist>
        </div>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="language"> Genre: </label>
          <input type="text" name="city" list="categories" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" />
          <datalist id="categories">
            @foreach( $categories as $category)
              <option value="$category->name"></option>
            @endforeach
          </datalist>
        </div>

        <div class="flex items-center justify-between">
          <button class="focus:shadow-outline rounded bg-purple w-full px-4 py-2 font-bold text-white focus:outline-none" type="button">Submit</button>
        </div>
      </form>
    </div>


</x-app-layout>--}}


<x-book-form page="Add new book" :name="old('name')" :image="old('image')" :publication_year="old('publication_year')" :description="old('description')" :authors="$authors" :categories="$categories" />