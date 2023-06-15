@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center b px-1 pt-1 text-sm font-medium leading-5 text-black border-b-2 border-gray-100 hover:border-b-2 hover:border-purple hover:text-purple transition duration-150 ease-in-out focus:border-purple focus:outline-none'
            : 'inline-flex items-center b px-1 pt-1 text-sm font-medium leading-5 text-purple hover:border-b-2  transition duration-150 ease-in-out focus:outline-none';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
