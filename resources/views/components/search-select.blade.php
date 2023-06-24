@props(['title','request','values'])

<div class="mt-4">
    <span class="font-medium text-gray-700">{{$title}}:</span>
    <div class="mt-4 h-48 overflow-y-auto px-3 pb-3 text-sm text-gray-700">
        @foreach($values as $value)
            <div>
                <label class="inline-flex items-center">
                    @if( !is_null( request()->query( $request ) ) && in_array( $value->name,request()->query( $request )) )
                    <input type="checkbox" value="{{$value->name}}" name='categories[]' class="form-checkbox h-5 w-5 text-gray-600"  checked/>
                    @else
                    <input type="checkbox" value="{{$value->name}}" name='categories[]' class="form-checkbox h-5 w-5 text-gray-600"   />
                    @endif
                    <span class="ml-2 text-gray-700">{{$value->name}}</span>
                </label>
            </div>
        @endforeach
    </div>
</div>