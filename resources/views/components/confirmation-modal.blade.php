<!-- resources/views/components/delete-confirmation-modal.blade.php -->

@props(['action'])

@php
    $modalId = 'deleteConfirmationModal_' . Str::random(8);
@endphp

<div x-data="{ isOpen: false }">
    <button @click="isOpen = true" {{ $attributes->merge(['class' => 'bg-red-500 text-white font-bold py-2 px-4 rounded']) }}>Delete</button>

    <div x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <div class="bg-white p-4 rounded shadow-md z-10">
            <h2 class="text-lg font-semibold mb-4">Confirm Delete</h2>
            <p>Are you sure you want to delete?</p>

            <div class="mt-6 flex justify-end">
                <button @click="isOpen = false" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
                <form action="{{ $action }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

