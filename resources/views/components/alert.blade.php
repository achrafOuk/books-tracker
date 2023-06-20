@if (\Session::has('msg'))

    <div x-data="{ open:true }" class="flex p-4 mb-4 text-{{session('type')}}-800 rounded-lg bg-{{session('type')}}-50" x-show="open">
        {{session('msg')}}
        <button @click="open=false" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-{{session('type')}}-50 text-{{session('type')}}-500 rounded-lg focus:ring-2 focus:ring-{{session('type')}}-400 p-1.5 hover:bg-{{session('type')}}-200 inline-flex h-8 w-8 " >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>

@endif
