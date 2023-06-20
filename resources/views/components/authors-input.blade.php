@props(['authors','selected_authors'])



<div x-data="{count: {{ $selected_authors->count() > 0 ? $selected_authors->count() :1 }}, authors: {{ json_encode($selected_authors ?: []) }} }">
    <label class="mb-2 block text-sm font-bold text-gray-700" >Authors: </label>
    <template x-for="(author,index ) in authors" :key="index">
        <div class="flex mb-2" >
            <input 
            type="text" 
            x-model="authors[index].name"
            placeholder="Author name" 
            class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
            >
            <button type="button"
            class="px-4 py-2 ml-2 text-white bg-purple rounded-md focus:outline-none focus:ring "
            x-on:click="count++" >+</button>
            <button type="button"
            class="px-4 py-2 ml-2 text-white bg-purple rounded-md focus:outline-none focus:ring "
            x-show="count>1" x-on:click="count--" >-</button>
          </div>
        </div>
    </template>
</div>
