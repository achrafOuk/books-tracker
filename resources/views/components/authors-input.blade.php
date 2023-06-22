@props(['authors','selected_authors'])

<div x-data="{ authors: {{ json_encode($selected_authors->count() > 0 ? $selected_authors : ['name'=>'']) }} }">
      <label class="mb-2 block text-sm font-bold text-gray-700" >Authors: </label>
        <template x-for="(author,index ) in authors" :key="index">
        <div class="flex mb-2" >
            <input 
            type="text" 
            x-model="authors[index].name"
            placeholder="Author name" 
            class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
            name="authors[]"
            >
            <button type="button"
            class="px-4 py-2 ml-2 text-white bg-purple rounded-md focus:outline-none focus:ring "
            x-on:click="authors.push({name:''})"
            >+</button>
            <button type="button"
            class="px-4 py-2 ml-2 text-white bg-purple rounded-md focus:outline-none focus:ring "
            x-show="authors.length > 1" x-on:click="authors.splice(index, 1)" >-</button>
          </div>
        </div>
    </template>
</div>
