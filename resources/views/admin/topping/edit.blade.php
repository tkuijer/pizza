<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing topping: ":topping"', ['topping' => $topping->name]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-errors />
                    <x-success />

                    <form action="{{ route('topping.update', $topping) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <label class="block font-bold" for="name">{{ __('Name:') }}</label>
                        <input class="rounded-lg w-96 block mb-5 mt-2" type="text" name="name" id="name" value="{{ old('name', $topping->name) }}" placeholder="{{ __('Topping name') }}" />
                        <button class="rounded px-4 py-2 bg-indigo-500 hover:bg-indigo-400 text-gray-100" type="submit">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
