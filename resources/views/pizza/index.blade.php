<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pizza Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-7 px-4 w-full">
                        <a href="{{ route('pizza.create') }}">+ Add a new pizza</a>
                    </div>
                    <x-success />
                    @include('pizza.partials.listing', compact('pizzas'))
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
