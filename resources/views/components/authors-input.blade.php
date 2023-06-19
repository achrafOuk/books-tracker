@props(['authors','selected_authors'])

<div x-data="{ selected_authors: {{ $selected_authors ?? '[]' }},count:1">
  <label class="mb-2 block text-sm font-bold text-gray-700" > Authors: </label>
  <template x-for="i in count" >
    <div class="flex flex-row items-center " >
        <div class="w-1/2 flex flex-col mr-2" >
            <input type="text" 
            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" 
            name="authors[]"
            x-bind:value="selected_authors[i]"
            >
            <datalist id="authors">
                @foreach( $authors as $author)
                <option value="{{$author->name}}"></option>
                @endforeach
            </datalist>
        </div>
        <div class="flex flex-row mr-2 mt-10 ">
            <button type="button" x-on:click="count++"  class="flex-shrink-0 px-4 py-2 text-white bg-yellow mr-2 font-bold">
                +
            </button>
            <button type="button" x-show="count>1" x-on:click="count--"  class="flex-shrink-0 px-4 py-2 text-white bg-yellow font-bold">
                -
            </button>

        </div>
    </div>
  </template>
</div>