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
                    <table class="w-full mx-2">
                        <thead>
                        <tr class="border-b">
                            <th class="text-center px-2">ID</th>
                            <th class="text-left">Name</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pizzas as $pizza)
                                <tr class="hover:bg-gray-200 py-2">
                                    <td class="text-center px-2">
                                        <a class="hover:underline inline-block w-full" href="{{ route('pizza.edit', $pizza) }}">
                                            {{ $pizza->id }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="hover:underline inline-block w-full" href="{{ route('pizza.edit', $pizza) }}">
                                            {{ $pizza->name }}
                                        </a>
                                    </td>
                                    <td class="text-right px-2">x +</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
