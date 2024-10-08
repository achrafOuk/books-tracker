@props(['page','route', 'name', 'image', 'publication_year','description','categories','authors','category','selected_authors','title'])
<x-app-layout title="{{ $title }}">
<div class="mx-auto w-full py-4">
      <form method="POST" action="{{$route}}" class="mb-4 rounded bg-white px-8 pb-8 pt-6">
        @csrf
        @include('components.alert-error')
        @include('components.alert')

        <h1 class="mb-4 font-bold">{{$page}}</h1>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="bookName"> Book Name </label>
          <input 
          class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" 
          name="name"
          value="{{$name}}" type="text" />
        </div>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="imageInput"> Image </label>
          <input 
          class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"  
          value="{{$image}}"
          name="image"
          type="text" />
        </div>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="publicationYear"> Publication Year </label>
          <input class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"  
          value="{{$publication_year}}"
          name="publication_year"
          type="number" />
        </div>
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="description"> Description </label>
          <textarea 
          name="description"
          class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"  rows="4" >{{$description}} </textarea>
        </div>

        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="language">Category: </label>
          <input  name="category" type="text" name="category" value="{{$category}}" list="categories" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" />
          <datalist id="categories">
            @foreach( $categories as $category_value)
              <option value="{{$category_value->name}}" ></option>
            @endforeach
          </datalist>
        </div>

        <x-authors-input :authors="$authors" :selected_authors="$selected_authors ?? ['name'=>'']" />
        <div class="flex items-center justify-between">
          <button type="submit" class="focus:shadow-outline rounded bg-purple w-full px-4 py-2 font-bold text-white focus:outline-none" type="button">Submit</button>
        </div>
      </form>
    </div>


</x-app-layout>