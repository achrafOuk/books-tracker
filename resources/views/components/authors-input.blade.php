@props(['authors','selected_authors'])

<div class="mb-4" x-data="{ selected_authors: {{ $selected_authors ?? '[]' }},count:1, }">
    <label class="mb-2 block text-sm font-bold text-gray-700" >Authors: </label>
    <template x-for="i in count" >
        <div class="flex mb-2">
            <input id="category" name="category" list="categoryOptions"
            type="text"
            class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
            required>
            <button type="button"
            class="px-4 py-2 ml-2 text-white bg-purple rounded-md focus:outline-none focus:ring "
            x-on:click="count++" >+</button>
            <button type="button"
            class="px-4 py-2 ml-2 text-white bg-purple rounded-md focus:outline-none focus:ring "
            x-show="count>1" x-on:click="count--" >-</button>
        </div>
    </template>
</div>