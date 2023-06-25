@props(['title','request','values'])


<div class="mt-4">
    <span class="font-medium text-gray-700">{{$title}}:</span>
    <div class="mt-4 max-h-48 h-fit overflow-y-auto px-3 pb-3 text-sm text-gray-700">
        @foreach($values as $value)
            <div>
                <label class="inline-flex items-center">
                    @php
                    $data = $request == 'status' ? $value->status : $value->name 
                    @endphp
                    @if( !is_null( request()->query( $request ) ) && in_array( $value->name,request()->query( $request )) )
                    <input type="checkbox" value="{{ $data }}" name='{{$request}}[]' class="form-checkbox h-5 w-5 text-gray-600"  checked/>
                    @else
                    <input type="checkbox" value="{{ $data }}" name='{{$request}}[]' class="form-checkbox h-5 w-5 text-gray-600"   />
                    @endif
                    <span class="ml-2 text-gray-700">{{ $data }}</span>
                </label>
            </div>
        @endforeach
    </div>
</div>