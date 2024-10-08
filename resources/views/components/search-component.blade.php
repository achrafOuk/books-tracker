@props(['action','searchTerm','authors','categories','open','status'=>[]])

<div  :class="{'hidden md:block w-[30%] mr-[2%]':!open,'p-4 z-50 w-full ':open}">

  <form  action="{{$action}}" method="GET">
    <p class="icon-settings block sm:hidden" @click="open=!open" style="padding: 2%;cursor: pointer;width: fit-content;text-align: center;background: white;color: black;border: .1rem solid;">
    <div class="mb-4">
      <label for="q" class="block mb-2">Search:</label>
      <input type="text" value="{{ empty($searchTerm) ? '':$searchTerm }}" name="q" class="rounded-lg border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none sm:w-full"/>
    </div>

    <x-search-select title="Authors" request="authors" :values="$authors">
    </x-search-select>

    <x-search-select title="Category" request="categories" :values="$categories">
    </x-search-select>
    @if( count($status) )
      <x-search-select title="Status" request="status" :values="$status">
      </x-search-select>
    @endif

    <button type="submit" class="mt-4 bg-purple text-white font-bold py-2 px-4 rounded sm:w-full">
      Search
    </button>
  </form>
</div>
