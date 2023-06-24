@props(['code_status','message'])
<x-app-layout title="{{$code_status}} page">

<main class="grid  place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8 mt-[5%] h-screen">
  <div class="text-center">
    <p class="text-base font-semibold text-purple">{{ $code_status }}</p>
    <p class="mt-6 text-base leading-7 text-gray-600">{{ $message }}</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      @if( Auth::check() || Auth::user()->hasRole('user') )
        <a href="{{ route('index') }}" class="block bg-purple text-white font-semibold rounded-lg px-4 py-3">
      @else
        <a href="{{ route('dashboard') }}" class="block bg-purple text-white font-semibold rounded-lg px-4 py-3">
      @endif
        Go back home
      </a>
    </div>
  </div>
</main>

</x-app-layout>